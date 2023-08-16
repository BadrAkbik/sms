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


    public function show(Father $father)
    {
        return new FatherResource($father);
    }


    public function update(UpdateFatherRequest $request, Father $father)
    {
        $father->update($request->safe()->all());
        return new FatherResource($father);
    }


    public function destroy(Father $father)
    {
        $father->delete();

        return response()->json([
            'data' => 'This Exam has been deleted successfuly'
        ]);
    }
}
