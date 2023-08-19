<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\BaseControllers\PendingUserController;
use App\Http\Resources\TeacherResource;
use App\Models\Teacher;

class PendingTeacherController extends PendingUserController
{
    protected $model = Teacher::class;
    protected $resource = TeacherResource::class;
}
