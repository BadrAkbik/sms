<?php

namespace App\Http\Controllers\PivotTableControllers;

use App\Http\Controllers\BaseControllers\PivotController;
use App\Http\Requests\Store\Pivot\StoreGradeSubjectRequest;

class GradeSubjectController extends PivotController
{
    protected $firstModelName ='grade';
    protected $secondModelName ='subject';

    public function store(StoreGradeSubjectRequest $request)
    {
        return parent::attach($request);
    }
}