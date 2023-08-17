<?php

namespace App\Http\Controllers;

use App\Http\Requests\Store\StoreGradeRequest;
use App\Http\Requests\Update\UpdateGradeRequest;
use App\Http\Resources\GradeResource;
use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function index()
    {
        return GradeResource::collection(Grade::all());
    }


    public function store(StoreGradeRequest $request)
    {
        return new GradeResource(Grade::create($request->safe()->all()));
    }


    public function show(Grade $grade)
    {
        return new GradeResource($grade);
    }


    public function update(UpdateGradeRequest $request, Grade $grade)
    {
        $grade->update($request->safe()->all());
        return new GradeResource($grade);
    }


    public function destroy(Grade $grade)
    {
        $grade->delete();

        return response()->json([
            'data' => 'This grade has been deleted successfuly'
        ]);
    }
}
