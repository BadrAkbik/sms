<?php

namespace App\Http\Requests\Auth;

use App\Traits\AuthRoles;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;

class RegisterRequest extends FormRequest
{
    use AuthRoles;

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
            'name' => ['required', 'string', 'min:2'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique($this->getRoleModel($this->request))],
            'date_of_birth' => ['required', 'date'],
            'gender' => ['required', 'in:male,female'],
            'address' => ['string', 'max:100'],
            'phone_num' => ['required', 'digits_between:10,20'],
            'date_of_join' => ['required', 'date'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()]
        ];
    }
}
