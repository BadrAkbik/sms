<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseControllers\GeneralController;
use App\Http\Requests\Store\StoreOutcomeRequest;
use App\Http\Requests\Update\UpdateOutcomeRequest;
use App\Http\Resources\Collections\OutcomeCollcetion;
use App\Http\Resources\OutcomeResource;
use App\Models\Outcome;

class OutcomeController extends GeneralController
{
    protected $model = Outcome::class;
    protected $resource = OutcomeResource::class;
    
    
    public function store(StoreOutcomeRequest $request)
    {
        return parent::storeItem($request);
    }
    
    public function update(UpdateOutcomeRequest $request, Outcome $outcome)
    {
        return parent::updateItem($request, $outcome);
    }

    public function index()
    {
        return new OutcomeCollcetion(Outcome::with('student')->with('subject')->get());
    }

}
