<?php

namespace App\Http\Requests\Update;

use App\Models\Subject;
use Illuminate\Foundation\Http\FormRequest;

class UpdateResultRequest extends FormRequest
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
            'student_id' => ['integer', 'exists:students,id'],
            'exam_id' => ['integer', 'exists:exams,id'],
            'grade_id' => ['integer', 'exists:grades,id'],
            'subject_id' => ['integer', 'exists:subjects,id'],
            'mark' => ['numeric', 'max:'.$this->getMaxMark()],
            'status' => ['boolean']
        ];
    }

    public function getMaxMark(){
        $subject = Subject::findOrFail(request()->subject_id);
        return $subject->max_mark;
    }
}
