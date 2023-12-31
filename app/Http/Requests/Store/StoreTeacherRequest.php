<?php

namespace App\Http\Requests\Store;

use App\Traits\AuthRules;
use Illuminate\Foundation\Http\FormRequest;


class StoreTeacherRequest extends FormRequest
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
        return $this->teacherStudentStoreRules();
    }
}
