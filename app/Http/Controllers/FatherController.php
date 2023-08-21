<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseControllers\GeneralController;
use App\Http\Requests\Store\StoreFatherRequest;
use App\Http\Requests\Update\UpdateFatherRequest;
use App\Http\Resources\Collections\FatherCollcetion;
use App\Http\Resources\FatherResource;
use App\Models\Father;

class FatherController extends GeneralController
{
    protected $model = Father::class;
    protected $resource = FatherResource::class;
    
    
    public function store(StoreFatherRequest $request)
    {
        return parent::storeItem($request);
    }
    
    public function update(UpdateFatherRequest $request, Father $father)
    {
        return parent::updateItem($request, $father);
    }

    public function index()
    {
        return new FatherCollcetion(Father::all());
    }

}
