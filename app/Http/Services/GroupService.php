<?php

namespace App\Http\Services;

use App\Http\Repositories\Contracts\GroupRepositoryInterface;

class GroupService
{
    protected $groupRepository;

    public function __construct(GroupRepositoryInterface $groupRepository)
    {
        $this->groupRepository = $groupRepository;
    }

    /**
     * Get all groups
     * @return array
     */
    public function getListGroups()
    {
        return $this->groupRepository->getListGroups();
    }

    /**
     * Get group by id
     * @param int $id
     * @return object
     */
    public function getGroupById(int $id)
    {
        return $this->groupRepository->getGroupById($id);
    }

    /**
     * Create a new group
     * @param array $group
     * @return object
     */
    public function createGroup(array $group)
    {
        return $this->groupRepository->createGroup($group);
    }

    /**
     * Update group
     * @param object $newGroup
     * @return object
     */
    public function updateGroup(object $newGroup)
    {
        $currentGroup = $this->groupRepository->getGroupById($newGroup->id);
        if (!$currentGroup) {
            return response()->json(['message' => 'Group not found'], 404);
        }
        if ($currentGroup['name'])
            $currentGroup['name'] = $newGroup->name;
        return $this->groupRepository->updateGroup($currentGroup);
    }

    /**
     * Inactivate group
     * @param int $id
     * @return object
     */
    public function inactivateGroup(int $id)
    {
        $group = $this->groupRepository->getGroupById($id);
        if (!$group) {
            return response()->json(['message' => 'Group not found'], 404);
        }
        if ($group['name'])
            $group['active'] = 0;
        return $this->groupRepository->updateGroup($group);
    }

    /**
     * Delete group
     * @param int $id
     * @return object
     */
    public function deleteGroup(int $id)
    {
        $group = $this->groupRepository->getGroupById($id);
        if (!$group) {
            return response()->json(['message' => 'Group not found'], 404);
        }
        return $this->groupRepository->deleteGroup($id);
    }
}
