<?php

namespace App\Http\Resources\Collections;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class StudentCollection extends ResourceCollection
{

    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection->transform(function ($student) {
                return [
                    'Id' => $student->id,
                    'Name' => $student->name,
                    'Email' => $student->email,
                    'Date of birth' => $student->date_of_birth,
                    'Gender' => $student->gender,
                    'Address' => $student->address,
                    'Phone number' => $student->phone_num,
                    'Date of join' => $student->date_of_join,
                    'Grade id' => $student->grade->id,
                    'Grade name' => $student->grade->name,
                    'Section id' => $student->section->id ?? null,
                    'Section name' => $student->section->name ?? null,
                    'Created at' => $student->created_at->format('d/m/Y H:i'),
                    'Updated at' => $student->updated_at->format('d/m/Y H:i'),
                ];
            }),
        ];
    }
}
