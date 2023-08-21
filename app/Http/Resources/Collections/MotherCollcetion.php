<?php

namespace App\Http\Resources\Collections;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class MotherCollcetion extends ResourceCollection
{

    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection->transform(function ($mother) {
                return [
                    'Id' => $mother->id,
                    'Name' => $mother->name,
                    'Phone number' => $mother->phone_num,
                    'Job' => $mother->work,
                    'Date of birth' => $mother->date_of_birth,
                    'Created at' => $mother->created_at->format('d/m/Y H:i'),
                    'Updated at' => $mother->updated_at->format('d/m/Y H:i')
                ];
            }),
        ];
    }
}
