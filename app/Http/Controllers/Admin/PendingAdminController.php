<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseControllers\PendingUserController;
use App\Http\Resources\AdminResource;
use App\Http\Resources\Collections\AdminCollection;
use App\Models\Admin;

class PendingAdminController extends PendingUserController
{
    protected $model = Admin::class;
    protected $resource = AdminResource::class;
    protected $collection = AdminCollection::class;
}
