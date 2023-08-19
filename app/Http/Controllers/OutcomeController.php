<?php

namespace App\Http\Controllers;

use App\Http\Requests\Store\StoreOutcomeRequest;
use App\Http\Requests\Update\UpdateOutcomeRequest;
use App\Http\Resources\OutcomeResource;
use App\Models\Outcome;

class OutcomeController extends Controller
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
        return OutcomeResource::collection(Outcome::with('student')->with('subject')->get());
    }

}
