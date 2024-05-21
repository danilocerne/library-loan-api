<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUpdateUser;
use App\Http\Resources\UserResource;
use App\Http\Services\UserService;
use App\Models\User;
use Mockery\Exception;

class UserController extends Controller
{

    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function login()
    {
        $data = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        $user = $this->userService->getUserByEmail($data['email']);

        if (!$user || !Hash::check($data['password'], $user->password)) {
            return response([
                'message' => 'Invalid email or password.'
            ], 401);
        }

        $token = $user->createToken("auth_token")->plainTextToken;

        $response = new StdClass();
        $response->user = $user;
        $response->token = $token;

        return $response;
    }

    public function logout()
    {
        if (auth()->hasUser()) {
            try {
                auth()->user()->currentAccessToken()->delete();
                return response([
                    "message" => "User successfully logged out."
                ], 200);
            } catch(Exception $exception) {
                return response()->json([
                    'info' => 'error',
                    'result' => 'Unable to capture user data!',
                    'error' => $exception->getMessage()
                ], 500);
            }
        }
        return response([
            "message" => "User is not logged in."
        ], 401);
    }

    public function index()
    {
        $users = $this->userService->getListUsers();
        return UserResource::collection($users);
    }

    public function getUserById($id)
    {
        $user = $this->userService->getUserById($id);
        return UserResource::collection($user);
    }

    public function store(StoreUpdateUser $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed'
        ]);

        $user = $this->userService->createUser($data);

        $token = $user->createToken('auth_token')->plainTextToken;

        $response = new StdClass();
        $response->user = $user;
        $response->token = $token;

        return new UserResource($response);
    }

    public function show($id)
    {
        $user = $this->userService->getUserById($id);
        return new UserResource($user);
    }

    public function update(StoreUpdateUser $request, $id)
    {
        $user = $this->userService->updateUser($id, $request->all());
        return $user;
    }

    public function inactivate(StoreUpdateUser $request, $id)
    {
        $user = $this->userService->inactivateUser($id, $request->all());
        return $user;
    }

    public function destroy($id)
    {
        $user = $this->userService->deleteUser($id);
        return $user;
    }

}
