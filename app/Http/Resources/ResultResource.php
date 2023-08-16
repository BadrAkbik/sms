<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ResultResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'Id' => $this->id,
            'Student name' => $this->student->name,
            'Exam type' => $this->exam->type,
            'Exam semester' => $this->exam->semester,
            'Grade name' => $this->grade->name,
            'Subject name' => $this->subject->name,
            'Mark' => $this->mark,
            'Status' => $this->status
        ];
    }
}
