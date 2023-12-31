<?php

namespace App\Http\Requests\Store;

use Illuminate\Foundation\Http\FormRequest;

class StoreExamRequest extends FormRequest
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
            'date' => ['required', 'date'],
            'semester' => ['required', 'string', 'max:20'],
            'type' => ['required', 'string', 'max:30'],
            'subject_id' => ['required', 'exists:subjects,id', 'integer']
        ];
    }
}
