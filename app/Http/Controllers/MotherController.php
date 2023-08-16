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


    public function show(Mother $attendance)
    {
        return new MotherResource($attendance);
    }


    public function update(UpdateMotherRequest $request, Mother $attendance)
    {
        $attendance->update($request->safe()->all());
        return new MotherResource($attendance);
    }


    public function destroy(Mother $attendance)
    {
        $attendance->delete();

        return response()->json([
            'data' => 'This Mother has been deleted successfuly'
        ]);
    }
}
