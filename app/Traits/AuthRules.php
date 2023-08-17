<?php

namespace App\Traits;

use App\Rules\oldPasswordValidate;
use Illuminate\Validation\Rules\Password;

trait AuthRules
{
    public function teacherStudentStoreRules()
    {
        return [
            'name' => ['required', 'string', 'min:2'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins', 'unique:teachers', 'unique:students'],
            'date_of_birth' => ['required', 'date'],
            'gender' => ['required', 'in:male,female'],
            'address' => ['string', 'max:100'],
            'phone_num' => ['string', 'max:15'],
            'date_of_join' => ['required', 'date'],
            'device_name' => ['required', 'string', 'max:20'],
            'password' => ['required', 'confirmed', Password::defaults()]
        ];
    }

    public function teacherStudentUpdateRules($user)
    {
        return [
            'name' => ['string', 'min:2'],
            'date_of_birth' => ['date'],
            'gender' => ['in:male,female'],
            'address' => ['string', 'max:100'],
            'phone_num' => ['string', 'max:15'],
            'date_of_join' => ['date'],
            'password' => ['confirmed', Password::defaults()],
            'old_password' => ['required_with:password', new oldPasswordValidate($user)]

        ];
    }

}
