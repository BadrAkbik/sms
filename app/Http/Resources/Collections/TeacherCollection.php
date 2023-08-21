<?php

namespace App\Http\Resources\Collections;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class TeacherCollection extends ResourceCollection
{

    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection->transform(function ($teacher) {
                return [
                    'Id' => $teacher->id,
                    'Name' => $teacher->name,
                    'Email' => $teacher->email,
                    'Date of birth' => $teacher->date_of_birth,
                    'Gender' => $teacher->gender,
                    'Address' => $teacher->address,
                    'Phone number' => $teacher->phone_num,
                    'Date of join' => $teacher->date_of_join,
                    'Created at' => $teacher->created_at->format('d/m/Y H:i'),
                    'Updated at' => $teacher->updated_at->format('d/m/Y H:i')
                ];
            }),
        ];
    }
}
