<?php

namespace App\Http\Requests\Store;

use App\Models\Subject;
use Illuminate\Foundation\Http\FormRequest;

class StoreOutcomeRequest extends FormRequest
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
            'student_id' => ['required', 'exists:students,id'],
            'subject_id' => ['required', 'exists:subjects,id'], 
            'first_sem' => ['required', 'numeric', 'max:'.$this->getMaxMark()],
            'second_sem' => ['required', 'numeric', 'max:'.$this->getMaxMark()],
            'total' => ['required', 'numeric'],
        ];
    }

    public function getMaxMark(){
        $subject = Subject::findOrFail(request()->subject_id);
        return $subject->max_mark;
    }
}
