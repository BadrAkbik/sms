<?php

namespace App\Http\Requests\Update;

use App\Rules\oldPasswordValidate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UpdateAdminRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if(auth()->user()->email != $this->admin->email){
            return false;
        }

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
            'name' => ['string', 'min:2'],
            'email' => ['string', 'email', 'max:255', Rule::unique('admins')->ignore($this->admin), 'unique:teachers', 'unique:students'],
            'password' => ['confirmed', Password::defaults()],
            'old_password' => ['required_with:password', new oldPasswordValidate($this->admin)],
        ];
    }

}