<?php

namespace App\Http\Repositories\Contracts;

interface UserTypeRepositoryInterface
{
    public function getListUserType();
    public function getUserTypeById(int $id);
    public function createUserType(array $userType);
    public function updateUserType(int $id);
    public function deleteUserType(int $id);
}
