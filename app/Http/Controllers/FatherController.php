<?php

namespace App\Http\Controllers;

use App\Http\Requests\Store\StoreFatherRequest;
use App\Http\Requests\Update\UpdateFatherRequest;
use App\Http\Resources\FatherResource;
use App\Models\Father;

class FatherController extends Controller
{
    public function index()
    {
        return FatherResource::collection(Father::all());
    }


    public function store(StoreFatherRequest $request)
    {
        return new FatherResource(Father::create($request->safe()->all()));
    }


    public function show(Father $attendance)
    {
        return new FatherResource($attendance);
    }


    public function update(UpdateFatherRequest $request, Father $attendance)
    {
        $attendance->update($request->safe()->all());
        return new FatherResource($attendance);
    }


    public function destroy(Father $attendance)
    {
        $attendance->delete();

        return response()->json([
            'data' => 'This Exam has been deleted successfuly'
        ]);
    }
}
