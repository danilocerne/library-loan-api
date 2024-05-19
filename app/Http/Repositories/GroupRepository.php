<?php

namespace App\Repositories;

use App\Repositories\Contracts\GroupRepositoryInterface;
use App\Model\Group;

class GroupRepository implements GroupRepositoryInterface
{
    protected $entity;

    public function __construct(Group $group)
    {
        $this->entity = $group;
    }

    /**
     * Get all groups
     * @return array
     */
    public function getListGroup()
    {
        return $this->entity->paginate();
    }

    /**
     * Get group by id
     * @param int $id
     * @return object
     */
    public function getGroupById(int $id)
    {
        return $this->entity->where('id', $id)->first();
    }

    /**
     * Create a new group
     * @param array $group
     * @return object
     */
    public function createGroup(array $group)
    {
        return $this->entity->create($group);
    }

    /**
     * Update group
     * @param object $group
     * @return object
     */
    public function updateGroup(object $group)
    {
        return $this->entity->update($group);
    }

    /**
     * Delete group
     * @param int $id
     * @return object
     */
    public function deleteGroup(int $id)
    {
        $this->entity->delete($id);
    }
}
