<?php

namespace App\Http\Repositories;

use App\Http\Repositories\Contracts\UserTypeRepositoryInterface;
use App\Model\UserType;

class UserTypeRepository implements UserTypeRepositoryInterface
{
    protected $entity;

    public function __construct(UserType $userType)
    {
        $this->entity = $userType;
    }

    /**
     * Get all user types
     * @return array
     */
    public function getListUserType()
    {
        return $this->entity->paginate();
    }

    /**
     * Get user type by id
     * @param int $id
     * @return object
     */
    public function getUserTypeById(int $id)
    {
        return $this->entity->where('id', $id)->first();
    }

    /**
     * Create a new user type
     * @param array $userType
     * @return object
     */
    public function createUserType(array $userType)
    {
        return $this->entity->create($userType);
    }

    /**
     * Update user type
     * @param object $userType
     * @return object
     */
    public function updateUserType(object $userType)
    {
        return $this->entity->update($userType);
    }

    /**
     * Delete user type
     * @param int $id
     * @return object
     */
    public function deleteUserType(int $id)
    {
        $this->entity->delete($id);
    }
}
