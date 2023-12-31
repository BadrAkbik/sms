<?php

namespace App\Http\Requests\Update;

use App\Models\Subject;
use Illuminate\Foundation\Http\FormRequest;

class UpdateOutcomeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'student_id' => ['exists:students,id'],
            'subject_id' => ['exists:subjects,id'], 
            'first_sem' => ['numeric'],
            'second_sem' => ['numeric'],
            'total' => ['numeric'],
        ];
    }
}
