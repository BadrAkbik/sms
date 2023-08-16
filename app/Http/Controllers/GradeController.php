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


    public function show(Grade $attendance)
    {
        return new GradeResource($attendance);
    }


    public function update(UpdateGradeRequest $request, Grade $attendance)
    {
        $attendance->update($request->safe()->all());
        return new GradeResource($attendance);
    }


    public function destroy(Grade $attendance)
    {
        $attendance->delete();

        return response()->json([
            'data' => 'This Exam has been deleted successfuly'
        ]);
    }
}
