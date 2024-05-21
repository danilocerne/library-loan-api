<?php

namespace App\Http\Services;

use App\Http\Repositories\Contracts\UserTypeRepositoryInterface;

class UserTypeService
{
    protected $userTypeRepository;

    public function __construct(UserTypeRepositoryInterface $userTypeRepository)
    {
        $this->userTypeRepository = $userTypeRepository;
    }

    /**
     * Get all user types
     * @return array
     */
    public function getListUserTypes()
    {
        return $this->userTypeRepository->getListUserTypes();
    }

    /**
     * Get user type by id
     * @param int $id
     * @return object
     */
    public function getUserTypeById(int $id)
    {
        return $this->userTypeRepository->getUserTypeById($id);
    }

    /**
     * Create a new user type
     * @param array $user
     * @return object
     */
    public function createUserType(array $user)
    {
        return $this->userTypeRepository->createUserType($user);
    }

    /**
     * Update user type
     * @param object $newUserType
     * @return object
     */
    public function updateUserType(object $newUserType)
    {
        $currentUserType = $this->userTypeRepository->getUserTypeById($newUserType->id);
        if (!$currentUserType) {
            return response()->json(['message' => 'User Type not found'], 404);
        }
        if ($currentUserType['name'])
            $currentUserType['name'] = $newUserType->name;
        return $this->userTypeRepository->updateUserType($currentUserType);
    }

    /**
     * Inactivate user type
     * @param int $id
     * @return object
     */
    public function inactivateUserType(int $id)
    {
        $user = $this->userTypeRepository->getUserTypeById($id);
        if (!$user) {
            return response()->json(['message' => 'User Type not found'], 404);
        }
        if ($user['name'])
            $user['active'] = 0;
        return $this->userTypeRepository->updateUserType($user);
    }

    /**
     * Delete user type
     * @param int $id
     * @return object
     */
    public function deleteUserType(int $id)
    {
        $user = $this->userTypeRepository->getUserTypeById($id);
        if (!$user) {
            return response()->json(['message' => 'User Type not found'], 404);
        }
        return $this->userTypeRepository->deleteUserType($id);
    }
}
