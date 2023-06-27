<?php

namespace App\Http\Requests\Store;

use Illuminate\Foundation\Http\FormRequest;

class StoreAccountmentRequest extends FormRequest
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
            'payments' => ['required', 'numeric', 'max:100000000'],
            'total' => ['required', 'numeric', 'max:100000000'],
            'date_of_payment' => ['required', 'date'],
            'student_id' => ['required', 'exists:students,id']
        ];
    }
}
