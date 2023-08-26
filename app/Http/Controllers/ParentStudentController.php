<?php

namespace App\Http\Controllers;

use App\Http\Requests\Store\StoreParentStudentRequest;
use App\Models\Student;

class ParentStudentController extends Controller
{

    public function store(StoreParentStudentRequest $request)
    {
        $student = Student::FindOrFail($request->student_id);
        $student->father()->sync($request->father_id);
        $student->mother()->sync($request->mother_id);
    }

    public function destroy($id)
    {
        $student = Student::find($id);
        $student->mother()->detach();
        $student->father()->detach();
    }
}
