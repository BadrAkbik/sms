<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AttendanceResource extends JsonResource
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
            'Status' => $this->status,
            'Student id' => $this->student_id,
            'Student name' => $this->student->name,
            'Created at' => $this->created_at->format('d/m/Y H:i'),
            'Updated at' => $this->updated_at->format('d/m/Y H:i')
        ];
    }
}
