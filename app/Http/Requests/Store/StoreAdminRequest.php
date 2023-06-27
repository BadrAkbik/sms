<?php

namespace App\Http\Requests\Store;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class StoreAdminRequest extends FormRequest
{

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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins', 'unique:teachers', 'unique:students'],
            'password' => ['required', 'confirmed', Password::defaults()],
            'device_name' => ['required', 'string', 'max:20'],
        ];
    }
}
