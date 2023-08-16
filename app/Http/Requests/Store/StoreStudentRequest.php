<?php

namespace App\Http\Requests\Store;

use App\Traits\AuthRules;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreStudentRequest extends FormRequest
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
            $this->teacherStudentStoreRules(),
            array('grade_id' => ['required', 'integer',Rule::exists('grades', 'id')],
                'section_id' => ['integer', 'exists:section,id']
            )
        );
    }
}