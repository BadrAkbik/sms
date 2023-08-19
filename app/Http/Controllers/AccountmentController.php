<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseControllers\GeneralController;
use App\Models\Accountment;
use App\Http\Requests\Store\StoreAccountmentRequest;
use App\Http\Requests\Update\UpdateAccountmentRequest;
use App\Http\Resources\AccountmentResource;

class AccountmentController extends GeneralController
{

    protected $model = Accountment::class;
    protected $resource = AccountmentResource::class;
    
    
    public function store(StoreAccountmentRequest $request)
    {
        return parent::storeItem($request);
    }
    
    public function update(UpdateAccountmentRequest $request, Accountment $accountment)
    {
        return parent::updateItem($request, $accountment);
    }
    
    public function index()
    {
        return AccountmentResource::collection(Accountment::with('student')->get());
    }
}
