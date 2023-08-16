<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OutcomeResource extends JsonResource
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
            'Fist Semester' => $this->first_sem,
            'Second Semester' => $this->second_sem,
            'Total' => $this->total,
            'Student' => $this->student->name,
            'Subject' => $this->subject->name
        ];
    }
}
