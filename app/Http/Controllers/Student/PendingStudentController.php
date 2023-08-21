<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\BaseControllers\PendingUserController;
use App\Http\Resources\Collections\StudentCollection;
use App\Http\Resources\StudentResource;
use App\Models\Student;

class PendingStudentController extends PendingUserController
{
    protected $model = Student::class;
    protected $resource = StudentResource::class;
    protected $collection = StudentCollection::class;

    public function index()
    {
        return new $this->collection($this->model::where('is_approved', 0)->with('section:id,name')->with('grade:id,name')->get());
    }
}
