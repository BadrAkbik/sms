<?php

namespace App\Http\Resources\Collections;

use App\Http\Resources\AccountmentResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class AccountmentCollection extends ResourceCollection
{

    public $collects = AccountmentResource::class;
    
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection
        ];
    }
}
