<?php

namespace App\Services;

use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Support\Str;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Get all users
     * @return array
     */
    public function getListUsers()
    {
        return $this->userRepository->getListUsers();
    }

    /**
     * Get user by id
     * @param int $id
     * @return object
     */
    public function getUserById(int $id)
    {
        return $this->userRepository->getUserById($id);
    }

    /**
     * Create a new user
     * @param array $user
     * @return object
     */
    public function createUser(array $user)
    {
        return $this->userRepository->createUser($user);
    }

    /**
     * Update user
     * @param object $newUser
     * @return object
     */
    public function updateUser(object $newUser)
    {
        $currentUser = $this->userRepository->getUserById($newUser->id);
        if (!$currentUser) {
            return response()->json(['message' => 'User not found'], 404);
        }
        if ($currentUser['name'])
            $currentUser['name'] = $newUser->name;
        return $this->userRepository->updateUser($currentUser);
    }

    /**
     * Inactivate user
     * @param int $id
     * @return object
     */
    public function inactivateUser(int $id)
    {
        $user = $this->userRepository->getUserById($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        if ($user['name'])
            $user['active'] = 0;
        return $this->userRepository->updateUser($user);
    }

    /**
     * Delete user
     * @param int $id
     * @return object
     */
    public function deleteUser(int $id)
    {
        $user = $this->userRepository->getUserById($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        return $this->userRepository->deleteUser($id);
    }
}
