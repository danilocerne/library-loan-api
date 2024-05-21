<?php

namespace App\Http\Repositories\Contracts;

interface UserRepositoryInterface
{
    public function getListUsers();
    public function getUserById(int $id);
    public function getUserByEmail(int $id);
    public function createUser(array $user);
    public function updateUser(int $id);
    public function deleteUser(int $id);
}
