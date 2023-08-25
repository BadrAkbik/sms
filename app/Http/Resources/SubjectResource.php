<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SubjectResource extends JsonResource
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
            'Name' => $this->name,
            'Max mark' => $this->max_mark,
            'Min mark' => $this->min_mark,
            'Teachers' => $this->teachers,
            'Grade' => $this->grade,
            'Exams' => $this->exams,
            'Results' => $this->results,
            'Outcomes' => $this->outcomes,
        ];
    }
}
