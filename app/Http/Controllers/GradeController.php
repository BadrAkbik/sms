<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseControllers\GeneralController;
use App\Http\Requests\Store\StoreGradeRequest;
use App\Http\Requests\Update\UpdateGradeRequest;
use App\Http\Resources\Collections\GradeCollcetion;
use App\Http\Resources\GradeResource;
use App\Models\Grade;

class GradeController extends GeneralController
{
    protected $model = Grade::class;
    protected $resource = GradeResource::class;
    
    
    public function store(StoreGradeRequest $request)
    {
        return parent::storeItem($request);
    }
    
    public function update(UpdateGradeRequest $request, Grade $grade)
    {
        return parent::updateItem($request, $grade);
    }

    public function index()
    {
        return new GradeCollcetion(Grade::all());
    }

}
