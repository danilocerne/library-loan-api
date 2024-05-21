<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\PermissionService;
use App\Http\Requests\StoreUpdatePermission;
use App\Http\Resources\PermissionResource;

class PermissionController extends Controller
{

    protected $permissionService;

    public function __construct(PermissionService $permissionService)
    {
        $this->permissionService = $permissionService;
    }

    public function index()
    {
        $permissions = $this->permissionService->getListPermissions();
        return PermissionResource::collection($permissions);
    }

    public function store(StoreUpdatePermission $request)
    {
        $permission = $this->permissionService->createPermission($request->all());
        return new PermissionResource($permission);
    }

    public function show($id)
    {
        $permission = $this->permissionService->getPermissionById($id);
        return new PermissionResource($permission);
    }

    public function update(StoreUpdatePermission $request, $id)
    {
        $permission = $this->permissionService->updatePermission($id, $request->all());
        return $permission;
    }

    public function inactivate(StoreUpdatePermission $request, $id)
    {
        $permission = $this->permissionService->inactivatePermission($id, $request->all());
        return $permission;
    }

    public function destroy($id)
    {
        $permission = $this->permissionService->deletePermission($id);
        return $permission;
    }

}
