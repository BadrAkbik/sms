<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseControllers\UserController;
use App\Http\Requests\Store\StoreAdminRequest;
use App\Http\Requests\Update\UpdateAdminRequest;
use App\Http\Resources\AdminResource;
use App\Http\Resources\Collections\AdminCollection;
use App\Models\Admin;

class AdminController extends UserController
{
    protected $model = Admin::class;
    protected $resource = AdminResource::class;

    public function index()
    {  
        return new AdminCollection(Admin::all());
    }

    public function store(StoreAdminRequest $request)
    {
        return parent::storeUser($request);
    }
    
    public function update($id, UpdateAdminRequest $request)
    {
        return parent::updateUser($id, $request);
    }
}
