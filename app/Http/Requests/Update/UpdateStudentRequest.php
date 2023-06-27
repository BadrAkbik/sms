<?php

namespace App\Http\Requests\Update;

use App\Traits\AuthRules;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateStudentRequest extends FormRequest
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
            $this->teacherStudentUpdateRules($this->student),
            array(
                'email' => ['string', 'email', 'max:255', 'unique:admins', 'unique:teachers', Rule::unique('students')->ignore($this->student)],
                'grade_id' => ['numeric',Rule::exists('grades', 'id')],
                'section_id' => ['numeric', 'exists:section,id'],
            )
        );
    }
}
