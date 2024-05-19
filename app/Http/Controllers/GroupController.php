<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GroupService;
use App\Http\Requests\StoreUpdateGroup;
use App\Http\Resources\GroupResource;

class GroupController extends Controller
{

    protected $groupService;

    public function __construct(GroupService $groupService)
    {
        $this->groupService = $groupService;
    }

    public function index()
    {
        $groups = $this->groupService->getListGroups();
        return GroupResource::collection($groups);
    }

    public function store(StoreUpdateGroup $request)
    {
        $group = $this->groupService->createGroup($request->all());
        return new GroupResource($group);
    }

    public function show($id)
    {
        $group = $this->groupService->getGroupById($id);
        return new GroupResource($group);
    }

    public function update(StoreUpdateGroup $request, $id)
    {
        $group = $this->groupService->updateGroup($id, $request->all());
        return $group;
    }

    public function inactivate(StoreUpdateGroup $request, $id)
    {
        $group = $this->groupService->inactivateGroup($id, $request->all());
        return $group;
    }

    public function destroy($id)
    {
        $group = $this->groupService->deleteGroup($id);
        return $group;
    }

}
