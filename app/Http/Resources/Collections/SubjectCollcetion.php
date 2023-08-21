<?php

namespace App\Http\Resources\Collections;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class SubjectCollcetion extends ResourceCollection
{

    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection->transform(function ($subject) {
                return [
                    'Id' => $subject->id,
                    'Name' => $subject->name,
                    'Max mark' => $subject->max_mark,
                    'Min mark' => $subject->min_mark
                ];
            }),
        ];
    }
}
