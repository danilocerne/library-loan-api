<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
use App\Http\Requests\StoreUpdateUser;
use App\Http\Resources\UserResource;

class UserController extends Controller
{

    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $users = $this->userService->getListUsers();
        return UserResource::collection($users);
    }

    public function store(StoreUpdateUser $request)
    {
        $user = $this->userService->createUser($request->all());
        return new UserResource($user);
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
