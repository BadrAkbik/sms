<?php

namespace App\Http\Resources\Collections;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class GradeCollcetion extends ResourceCollection
{

    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection->transform(function ($grade) {
                return [
                    'Id' => $grade->id,
                    'Name' => $grade->name,
                    'Created at' => $grade->created_at->format('d/m/Y H:i'),
                    'Updated at' => $grade->updated_at->format('d/m/Y H:i')
                ];
            }),
        ];
    }
}
