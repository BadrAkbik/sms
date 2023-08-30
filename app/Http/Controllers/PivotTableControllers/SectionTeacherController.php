<?php

namespace App\Http\Controllers\PivotTableControllers;

use App\Http\Controllers\BaseControllers\PivotController;
use App\Http\Requests\Store\Pivot\StoreSectionTeacherRequest;

class SectionTeacherController extends PivotController
{
    protected $firstModelName ='teacher';
    protected $secondModelName ='section';

    public function store(StoreSectionTeacherRequest $request)
    {
        return parent::attach($request);
    }
}