<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\UserController;
use App\Http\Requests\Store\StoreAdminRequest;
use App\Http\Requests\Update\UpdateAdminRequest;
use App\Http\Resources\AdminResource;
use App\Models\Admin;

class AdminController extends UserController
{
    protected $model = Admin::class;
    protected $resource = AdminResource::class;

    public function store(StoreAdminRequest $request)
    {
        return parent::storeUser($request);
    }
    
    public function update($id, UpdateAdminRequest $request)
    {
        return parent::updateUser($id, $request);
    }
}
