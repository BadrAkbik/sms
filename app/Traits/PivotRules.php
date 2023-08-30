<?php

namespace App\Traits;

use Illuminate\Validation\Rule;

trait PivotRules
{
    public function gradablesStoreRules($gradableType)
    {
        $gradable_id = $gradableType . '_id';
        return [
            'grade_id' => [
                'required', 'exists:grades,id',
                Rule::unique('gradables', 'grade_id')
                    ->where('gradable_id', request()->$gradable_id)->where('gradable_type', 'App\Models\\' . $gradableType),
            ],
            $gradable_id => ['exists:' . $gradableType . 's,id']
        ];
    }

    public function teacherPivotStoreRules($attribute)
    {
        $attribute_id = $attribute . '_id';

        return [
            'teacher_id' => [
                'required', 'exists:teachers,id',
                Rule::unique($attribute.'_teacher', 'teacher_id')
                    ->where($attribute_id, request()->$attribute_id),
            ],
            $attribute_id => ['exists:'.$attribute.'s,id']
        ];
    }

    public function message($firstAttr, $secondAttr)
    {
        return [
            $firstAttr . '.unique' => 'The ' . $firstAttr . ' and ' . $secondAttr . ' have already been used',
        ];
    }
}
