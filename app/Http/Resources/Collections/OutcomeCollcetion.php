<?php

namespace App\Http\Resources\Collections;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class OutcomeCollcetion extends ResourceCollection
{

    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection->transform(function ($outcome) {
                return [
                    'Id' => $outcome->id,
                    'Fist Semester' => $outcome->first_sem,
                    'Second Semester' => $outcome->second_sem,
                    'Total' => $outcome->total,
                    'Student' => $outcome->student->name,
                    'Subject' => $outcome->subject->name
                ];
            }),
        ];
    }
}
