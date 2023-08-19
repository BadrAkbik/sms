<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\BaseControllers\UserController;
use App\Models\Student;
use App\Http\Requests\Store\StoreStudentRequest;
use App\Http\Requests\Update\UpdateStudentRequest;
use App\Http\Resources\StudentResource;


class StudentController extends UserController
{
    protected $model = Student::class;
    protected $resource = StudentResource::class;

    public function index()
    {
        return StudentResource::collection(Student::with('grade')->with('section')->get());
    }

    public function store(StoreStudentRequest $request)
    {
        return parent::StoreUser($request);
    }

    public function update(Student $student, UpdateStudentRequest $request)
    {
        return parent::updateUser($student, $request);
    }

}
