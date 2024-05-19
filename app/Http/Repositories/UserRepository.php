<?php

namespace App\Repositories;

use App\Repositories\Contracts\UserRepositoryInterface;
use App\Model\User;

class UserRepository implements UserRepositoryInterface
{
    protected $entity;

    public function __construct(User $user)
    {
        $this->entity = $user;
    }

    /**
     * Get all users
     * @return array
     */
    public function getListUser()
    {
        return $this->entity->paginate();
    }

    /**
     * Get user by id
     * @param int $id
     * @return object
     */
    public function getUserById(int $id)
    {
        return $this->entity->where('id', $id)->first();
    }

    /**
     * Create a new user
     * @param array $user
     * @return object
     */
    public function createUser(array $user)
    {
        return $this->entity->create($user);
    }

    /**
     * Update user
     * @param object $user
     * @return object
     */
    public function updateUser(object $user)
    {
        return $this->entity->update($user);
    }

    /**
     * Delete user
     * @param int $id
     * @return object
     */
    public function deleteUser(int $id)
    {
        $this->entity->delete($id);
    }
}
