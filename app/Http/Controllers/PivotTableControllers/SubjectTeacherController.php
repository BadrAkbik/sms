<?php

namespace App\Http\Controllers\PivotTableControllers;

use App\Http\Controllers\BaseControllers\PivotController;
use App\Http\Requests\Store\Pivot\StoreSubjectTeacherRequest;


class SubjectTeacherController extends PivotController
{
    protected $firstModelName ='teacher';
    protected $secondModelName ='subject';

    public function store(StoreSubjectTeacherRequest $request)
    {
        return parent::attach($request);
    }
}