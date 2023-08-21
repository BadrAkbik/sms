<?php

namespace App\Http\Resources\Collections;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class FatherCollcetion extends ResourceCollection
{

    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection->transform(function ($father) {
                return [
                    'Id' => $father->id,
                    'Name' => $father->name,
                    'Phone number' => $father->phone_num,
                    'Job' => $father->work,
                    'Date of birth' => $father->date_of_birth,
                    'Created at' => $father->created_at->format('d/m/Y H:i'),
                    'Updated at' => $father->updated_at->format('d/m/Y H:i')
                ];
            }),
        ];
    }
}
