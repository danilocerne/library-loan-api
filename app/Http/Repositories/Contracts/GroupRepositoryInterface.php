<?php

namespace App\Repositories\Contracts;

interface GroupRepositoryInterface
{
    public function getListGroup();
    public function getGroupById(int $id);
    public function createGroup(array $group);
    public function updateGroup(int $id);
    public function deleteGroup(int $id);
}
