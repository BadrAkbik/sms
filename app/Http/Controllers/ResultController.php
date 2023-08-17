<?php

namespace App\Http\Controllers;

use App\Http\Requests\Store\StoreResultRequest;
use App\Http\Requests\Update\UpdateResultRequest;
use App\Http\Resources\ResultResource;
use App\Models\Result;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function index()
    {
        return ResultResource::collection(Result::with('grade')->with('exam')->with('subject')->with('student')->get());
    }


    public function store(StoreResultRequest $request)
    {
        return new ResultResource(Result::create($request->safe()->all()));
    }


    public function show(Result $result)
    {
        return new ResultResource($result);
    }


    public function update(UpdateResultRequest $request, Result $result)
    {
        $result->update($request->safe()->all());
        return new ResultResource($result);
    }


    public function destroy(Result $result)
    {
        $result->delete();

        return response()->json([
            'data' => 'This Result has been deleted successfuly'
        ]);
    }
}
