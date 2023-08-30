<?php

namespace App\Http\Controllers\PivotTableControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Store\Pivot\StoreParentStudentRequest;
use App\Models\Student;

class ParentStudentController extends Controller
{
    public function __invoke(StoreParentStudentRequest $request)
    {
        $student = Student::FindOrFail($request->student_id);
        $student->father()->sync($request->father_id);
        $student->mother()->sync($request->mother_id);
    }
}