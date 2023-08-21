<?php

namespace App\Http\Resources\Collections;

use App\Http\Resources\AttendanceResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class AttendanceCollection extends ResourceCollection
{

    public $collects = AttendanceResource::class;
    
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection
        ];
    }
}
