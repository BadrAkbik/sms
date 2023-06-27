<?php

namespace App\Http\Controllers;

use App\Models\Accountment;
use App\Http\Requests\Store\StoreAccountmentRequest;
use App\Http\Requests\Update\UpdateAccountmentRequest;
use App\Http\Resources\AccountmentResource;

class AccountmentController extends Controller
{

    public function index()
    {
        return AccountmentResource::collection(Accountment::with('student')->get());
    }


    public function store(StoreAccountmentRequest $request)
    {
        return new AccountmentResource(Accountment::create($request->safe()->all()));
    }


    public function show(Accountment $accountment)
    {
        return new AccountmentResource($accountment);
    }


    public function update(UpdateAccountmentRequest $request, Accountment $accountment)
    {
        $accountment->update($request->safe()->all());
        return new AccountmentResource($accountment);
    }


    public function destroy(Accountment $accountment)
    {
        $accountment->delete();

        return response()->json([
            'data' => 'This student has been deleted successfuly'
        ]);
    }
}
