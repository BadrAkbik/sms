<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\PendingUserController;
use App\Http\Resources\AdminResource;
use App\Models\Admin;

class PendingAdminController extends PendingUserController
{
    protected $model = Admin::class;
    protected $resource = AdminResource::class;
}
