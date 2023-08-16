<?php

namespace App\Http\Controllers;

use App\Http\Requests\Store\StoreExamRequest;
use App\Http\Requests\Update\UpdateExamRequest;
use App\Http\Resources\ExamResource;
use App\Models\Exam;

class ExamController extends Controller
{
    public function index()
    {
        return ExamResource::collection(Exam::all());
    }


    public function store(StoreExamRequest $request)
    {
        return new ExamResource(Exam::create($request->safe()->all()));
    }


    public function show(Exam $exam)
    {
        return new ExamResource($exam);
    }


    public function update(UpdateExamRequest $request, Exam $exam)
    {
        $exam->update($request->safe()->all());
        return new ExamResource($exam);
    }


    public function destroy(Exam $exam)
    {
        $exam->delete();

        return response()->json([
            'data' => 'This Exam has been deleted successfuly'
        ]);
    }
}
