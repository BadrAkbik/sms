<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseControllers\GeneralController;
use App\Http\Requests\Store\StoreMotherRequest;
use App\Http\Requests\Update\UpdateMotherRequest;
use App\Http\Resources\Collections\MotherCollcetion;
use App\Http\Resources\MotherResource;
use App\Models\Mother;

class MotherController extends GeneralController
{
    protected $model = Mother::class;
    protected $resource = MotherResource::class;
    
    
    public function store(StoreMotherRequest $request)
    {
        return parent::storeItem($request);
    }
    
    public function update(UpdateMotherRequest $request, Mother $mother)
    {
        return parent::updateItem($request, $mother);
    }

    public function index()
    {
        return new MotherCollcetion(Mother::all());
    }

}
