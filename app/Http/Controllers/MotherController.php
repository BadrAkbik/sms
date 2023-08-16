<?php

namespace App\Http\Controllers;

use App\Http\Requests\Store\StoreMotherRequest;
use App\Http\Requests\Update\UpdateMotherRequest;
use App\Http\Resources\MotherResource;
use App\Models\Mother;

class MotherController extends Controller
{
    public function index()
    {
        return MotherResource::collection(Mother::all());
    }


    public function store(StoreMotherRequest $request)
    {
        return new MotherResource(Mother::create($request->safe()->all()));
    }


    public function show(Mother $mother)
    {
        return new MotherResource($mother);
    }


    public function update(UpdateMotherRequest $request, Mother $mother)
    {
        $mother->update($request->safe()->all());
        return new MotherResource($mother);
    }


    public function destroy(Mother $mother)
    {
        $mother->delete();

        return response()->json([
            'data' => 'This Mother has been deleted successfuly'
        ]);
    }
}
