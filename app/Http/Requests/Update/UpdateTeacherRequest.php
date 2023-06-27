<?php

namespace App\Http\Requests\Update;

use App\Traits\AuthRules;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTeacherRequest extends FormRequest
{
    use AuthRules;
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
        return array_merge(
            $this->teacherStudentUpdateRules($this->teacher),
            array(
                'email' => ['string', 'email', 'max:255', 'unique:admins', 'unique:students', Rule::unique('teachers')->ignore($this->teacher)],
            )
        );
    }
}
