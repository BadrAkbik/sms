<?php

namespace App\Http\Controllers;

use App\Http\Requests\Store\StoreSubjectRequest;
use App\Http\Requests\Update\UpdateSubjectRequest;
use App\Http\Resources\SubjectResource;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        return SubjectResource::collection(Subject::all());
    }


    public function store(StoreSubjectRequest $request)
    {
        return new SubjectResource(Subject::create($request->safe()->all()));
    }


    public function show(Subject $subject)
    {
        return new SubjectResource($subject);
    }


    public function update(UpdateSubjectRequest $request, Subject $subject)
    {
        $subject->update($request->safe()->all());
        return new SubjectResource($subject);
    }


    public function destroy(Subject $subject)
    {
        $subject->delete();

        return response()->json([
            'data' => 'This Subject has been deleted successfuly'
        ]);
    }
}
