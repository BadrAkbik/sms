<?php

namespace App\Http\Requests\Update;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAccountmentRequest extends FormRequest
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
            'payments' => ['numeric', 'max:100000000'],
            'total' => ['numeric', 'max:100000000'],
            'date_of_payment' => ['date'],
            'student_id' => ['exists:students,id']
        ];
    }
}
