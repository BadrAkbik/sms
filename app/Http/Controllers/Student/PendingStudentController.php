<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\PendingUserController;
use App\Http\Resources\StudentResource;
use App\Models\Student;

class PendingStudentController extends PendingUserController
{
    protected $model = Student::class;
    protected $resource = StudentResource::class;

    public function index()
    {
        return $this->resource::collection($this->model::where('is_approved', 0)->with('section')->with('grade')->get());
    }
}
