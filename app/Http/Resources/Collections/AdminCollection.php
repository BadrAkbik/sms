<?php

namespace App\Http\Resources\Collections;

use App\Http\Resources\AdminResource;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class AdminCollection extends ResourceCollection
{

    public $collects = AdminResource::class;
    
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection
        ];
    }
}
