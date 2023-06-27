<?php

namespace App\Http\Resources\Collections;

use App\Http\Resources\AdminResource;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class AdminCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */

    public $collects = AdminResource::class;
    
    public function toArray(Request $request): array
    {
        return [
            'version' => '0.1',
            'data' => $this->collection
        ];
    }
}
