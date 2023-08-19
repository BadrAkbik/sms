<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\BaseControllers\UserController;
use App\Models\Teacher;
use App\Http\Requests\Store\StoreTeacherRequest;
use App\Http\Requests\Update\UpdateTeacherRequest;
use App\Http\Resources\TeacherResource;

class TeacherController extends UserController
{

    protected $model = Teacher::class;
    protected $resource = TeacherResource::class;

    public function store(StoreTeacherRequest $request)
    {
        return parent::storeUser($request);
    }
    
    public function update(Teacher $teacher, UpdateTeacherRequest $request)
    {
        return parent::updateUser($teacher, $request);
    }
    
}