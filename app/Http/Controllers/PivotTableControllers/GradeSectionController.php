<?php

namespace App\Http\Controllers\PivotTableControllers;

use App\Http\Controllers\BaseControllers\PivotController;
use App\Http\Requests\Store\Pivot\StoreGradeSectionRequest;


class GradeSectionController extends PivotController
{
    protected $firstModelName ='grade';
    protected $secondModelName ='section';
    
    public function store(StoreGradeSectionRequest $request)
    {
        return parent::attach($request);
    }
}