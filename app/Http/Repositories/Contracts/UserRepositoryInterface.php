<?php

namespace App\Repositories\Contracts;

interface UserRepositoryInterface
{
    public function getListUser();
    public function getUserById(int $id);
    public function createUser(array $user);
    public function updateUser(int $id);
    public function deleteUser(int $id);
}
