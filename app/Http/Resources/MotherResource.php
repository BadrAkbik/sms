<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MotherResource extends JsonResource
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
            'Phone number' => $this->phone_num,
            'Job' => $this->work,
            'Date of birth' => $this->date_of_birth,
            'Created at' => $this->created_at->format('d/m/Y H:i'),
            'Updated at' => $this->updated_at->format('d/m/Y H:i')
        ];
    }
}
