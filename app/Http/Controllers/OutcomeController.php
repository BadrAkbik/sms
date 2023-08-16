<?php

namespace App\Http\Controllers;

use App\Http\Requests\Store\StoreOutcomeRequest;
use App\Http\Requests\Update\UpdateOutcomeRequest;
use App\Http\Resources\OutcomeResource;
use App\Models\Outcome;
use Illuminate\Http\Request;

class OutcomeController extends Controller
{
    public function index()
    {
        return OutcomeResource::collection(Outcome::with('student')->with('subject')->get());
    }


    public function store(StoreOutcomeRequest $request)
    {
        return new OutcomeResource(Outcome::create($request->safe()->all()));
    }


    public function show(Outcome $outcome)
    {
        return new OutcomeResource($outcome);
    }


    public function update(UpdateOutcomeRequest $request, Outcome $outcome)
    {
        $outcome->update($request->safe()->all());
        return new OutcomeResource($outcome);
    }


    public function destroy(Outcome $outcome)
    {
        $outcome->delete();

        return response()->json([
            'data' => 'This Mother has been deleted successfuly'
        ]);
    }
}
