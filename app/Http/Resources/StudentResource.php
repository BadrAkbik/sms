<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
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
            'Grade id' => $this->grade->id,
            'Grade name' => $this->grade->name,
            'Section id' => $this->section->id ?? null,
            'Section name' => $this->section->name ?? null,
            'Created at' => $this->created_at->format('d/m/Y H:i'),
            'Updated at' => $this->updated_at->format('d/m/Y H:i'),
            'Accountment' => $this->accountment,
            'Attendances' => $this->attendances,
            'Results' => $this->results,
            'Mother' => $this->mothers,
            'Father' => $this->fathers,
            'Outcomes' => $this->outcomes,
            'teachers' => $this->section->teachers
        ];
    }
}
