<?php

namespace App\Repositories\Contracts;

interface PermissionRepositoryInterface
{
    public function getListPermission();
    public function getPermissionById(int $id);
    public function createPermission(array $permission);
    public function updatePermission(int $id);
    public function deletePermission(int $id);
}
