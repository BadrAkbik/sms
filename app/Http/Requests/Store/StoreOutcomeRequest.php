<?php

namespace App\Http\Requests\Store;

use App\Models\Subject;
use Illuminate\Foundation\Http\FormRequest;

class StoreOutcomeRequest extends FormRequest
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
            'student_id' => ['required', 'integer', 'exists:students,id'],
            'subject_id' => ['required', 'integer', 'exists:subjects,id'], 
            'first_sem' => ['required', 'numeric'],
            'second_sem' => ['required', 'numeric'],
            'total' => ['required', 'numeric'],
        ];
    }
}
