<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ExamResource extends JsonResource
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
            'Date' => $this->date,
            'Semester' => $this->semester,
            'Type' => $this->type,
            'Created at' => $this->created_at->format('d/m/Y H:i'),
            'Updated at' => $this->updated_at->format('d/m/Y H:i')
        ];
    }
}
