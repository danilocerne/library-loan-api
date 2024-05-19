<?php

namespace App\Services;

use App\Repositories\Contracts\PermissionRepositoryInterface;
use Illuminate\Support\Str;

class PermissionService
{
    protected $permissionRepository;

    public function __construct(PermissionRepositoryInterface $permissionRepository)
    {
        $this->permissionRepository = $permissionRepository;
    }

    /**
     * Get all permissions
     * @return array
     */
    public function getListPermissions()
    {
        return $this->permissionRepository->getListPermissions();
    }

    /**
     * Get permission by id
     * @param int $id
     * @return object
     */
    public function getPermissionById(int $id)
    {
        return $this->permissionRepository->getPermissionById($id);
    }

    /**
     * Create a new permission
     * @param array $permission
     * @return object
     */
    public function createPermission(array $permission)
    {
        return $this->permissionRepository->createPermission($permission);
    }

    /**
     * Update permission
     * @param object $newPermission
     * @return object
     */
    public function updatePermission(object $newPermission)
    {
        $currentPermission = $this->permissionRepository->getPermissionById($newPermission->id);
        if (!$currentPermission) {
            return response()->json(['message' => 'Permission not found'], 404);
        }
        if ($currentPermission['name'])
            $currentPermission['name'] = $newPermission->name;
        return $this->permissionRepository->updatePermission($currentPermission);
    }

    /**
     * Inactivate permission
     * @param int $id
     * @return object
     */
    public function inactivatePermission(int $id)
    {
        $permission = $this->permissionRepository->getPermissionById($id);
        if (!$permission) {
            return response()->json(['message' => 'Permission not found'], 404);
        }
        if ($permission['name'])
            $permission['active'] = 0;
        return $this->permissionRepository->updatePermission($permission);
    }

    /**
     * Delete permission
     * @param int $id
     * @return object
     */
    public function deletePermission(int $id)
    {
        $permission = $this->permissionRepository->getPermissionById($id);
        if (!$permission) {
            return response()->json(['message' => 'Permission not found'], 404);
        }
        return $this->permissionRepository->deletePermission($id);
    }
}
