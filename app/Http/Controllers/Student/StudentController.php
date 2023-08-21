<?php

namespace App\Http\Controllers\Student;

use App\Classes\StudentFilters;
use App\Http\Controllers\BaseControllers\UserController;
use App\Models\Student;
use App\Http\Requests\Store\StoreStudentRequest;
use App\Http\Requests\Update\UpdateStudentRequest;
use App\Http\Resources\Collections\StudentCollection;
use App\Http\Resources\StudentResource;


class StudentController extends UserController
{
    protected $model = Student::class;
    protected $resource = StudentResource::class;

    public function index(StudentFilters $filters)
    {
        return new StudentCollection(Student::with('grade:id,name')->with('section:id,name')->filter($filters)->get());
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
