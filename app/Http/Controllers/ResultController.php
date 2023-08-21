<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseControllers\GeneralController;
use App\Http\Requests\Store\StoreResultRequest;
use App\Http\Requests\Update\UpdateResultRequest;
use App\Http\Resources\Collections\ResultCollcetion;
use App\Http\Resources\ResultResource;
use App\Models\Result;

class ResultController extends GeneralController
{
    protected $model = Result::class;
    protected $resource = ResultResource::class;
    
    
    public function store(StoreResultRequest $request)
    {
        return parent::storeItem($request);
    }
    
    public function update(UpdateResultRequest $request, Result $result)
    {
        return parent::updateItem($request, $result);
    }

    public function index()
    {
        return new ResultCollcetion(Result::with('grade')->with('exam')->with('subject')->with('student')->get());
    }

}
