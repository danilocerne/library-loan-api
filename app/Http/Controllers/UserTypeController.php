<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\UserTypeService;
use App\Http\Requests\StoreUpdateUserType;
use App\Http\Resources\UserTypeResource;

class UserTypeController extends Controller
{

    protected $userTypeService;

    public function __construct(UserTypeService $userTypeService)
    {
        $this->userTypeService = $userTypeService;
    }

    public function index()
    {
        $userTypes = $this->userTypeService->getListUserTypes();
        return UserTypeResource::collection($userTypes);
    }

    public function store(StoreUpdateUserType $request)
    {
        $userType = $this->userTypeService->createUserType($request->all());
        return new UserTypeResource($userType);
    }

    public function show($id)
    {
        $userType = $this->userTypeService->getUserTypeById($id);
        return new UserTypeResource($userType);
    }

    public function update(StoreUpdateUserType $request, $id)
    {
        $userType = $this->userTypeService->updateUserType($id, $request->all());
        return $userType;
    }

    public function inactivate(StoreUpdateUserType $request, $id)
    {
        $userType = $this->userTypeService->inactivateUserType($id, $request->all());
        return $userType;
    }

    public function destroy($id)
    {
        $userType = $this->userTypeService->deleteUserType($id);
        return $userType;
    }

}
