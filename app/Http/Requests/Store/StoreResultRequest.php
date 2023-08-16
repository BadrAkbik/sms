<?php

namespace App\Http\Requests\Store;

use App\Models\Subject;
use Illuminate\Foundation\Http\FormRequest;

class StoreResultRequest extends FormRequest
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
            'student_id' => ['required', 'integer', 'exists:students,id'],
            'exam_id' => ['required', 'integer', 'exists:exams,id'],
            'grade_id' => ['required', 'integer', 'exists:grades,id'],
            'subject_id' => ['required', 'integer', 'exists:subjects,id'],
            'mark' => ['required', 'numeric', 'max:'.$this->getMaxMark()],
            'status' => ['required', 'boolean']
        ];
    }

    public function getMaxMark(){
        $subject = Subject::findOrFail(request()->subject_id);
        return $subject->max_mark;
    }
}
