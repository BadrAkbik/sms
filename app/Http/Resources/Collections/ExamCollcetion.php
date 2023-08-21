<?php

namespace App\Http\Resources\Collections;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ExamCollcetion extends ResourceCollection
{

    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection->transform(function ($exam) {
                return [
                    'Id' => $exam->id,
                    'Date' => $exam->date,
                    'Semester' => $exam->semester,
                    'Type' => $exam->type,
                    'Subject' => $exam->subject->name,
                    'Created at' => $exam->created_at->format('d/m/Y H:i'),
                    'Updated at' => $exam->updated_at->format('d/m/Y H:i')
                ];
            }),
        ];
    }
}
