<?php

namespace App\Repositories;

use App\Repositories\Contracts\PermissionRepositoryInterface;
use App\Model\Permission;

class PermissionRepository implements PermissionRepositoryInterface
{
    protected $entity;

    public function __construct(Permission $permission)
    {
        $this->entity = $permission;
    }

    /**
     * Get all permissions
     * @return array
     */
    public function getListPermission()
    {
        return $this->entity->paginate();
    }

    /**
     * Get permission by id
     * @param int $id
     * @return object
     */
    public function getPermissionById(int $id)
    {
        return $this->entity->where('id', $id)->first();
    }

    /**
     * Create a new permission
     * @param array $permission
     * @return object
     */
    public function createPermission(array $permission)
    {
        return $this->entity->create($permission);
    }

    /**
     * Update permission
     * @param object $permission
     * @return object
     */
    public function updatePermission(object $permission)
    {
        return $this->entity->update($permission);
    }

    /**
     * Delete permission
     * @param int $id
     * @return object
     */
    public function deletePermission(int $id)
    {
        $this->entity->delete($id);
    }
}
