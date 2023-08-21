<?php

namespace App\Http\Resources\Collections;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ResultCollcetion extends ResourceCollection
{

    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection->transform(function ($result) {
                return [
                    'Id' => $result->id,
                    'Student name' => $result->student->name,
                    'Exam type' => $result->exam->type,
                    'Exam semester' => $result->exam->semester,
                    'Grade name' => $result->grade->name,
                    'Subject name' => $result->subject->name,
                    'Mark' => $result->mark,
                    'Status' => $result->status
                ];
            }),
        ];
    }
}
