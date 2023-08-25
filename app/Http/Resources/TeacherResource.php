<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TeacherResource extends JsonResource
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
            'Email' => $this->email,
            'Date of birth' => $this->date_of_birth,
            'Gender' => $this->gender,
            'Address' => $this->address,
            'Phone number' => $this->phone_num,
            'Date of join' => $this->date_of_join,
            'Created at' => $this->created_at->format('d/m/Y H:i'),
            'Updated at' => $this->updated_at->format('d/m/Y H:i'),
            'Subjects' => $this->subjects,
            'Sections' => $this->sections
        ];
    }
}
