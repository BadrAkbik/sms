<?php

namespace Database\Factories;

use App\Models\Exam;
use App\Models\Grade;
use App\Models\Student;
use App\Models\Subject;
use Database\Factories\Helpers\FactoryHelper;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Result>
 */
class ResultFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_id' => FactoryHelper::getRandomModelId(Student::class),
            'exam_id' => FactoryHelper::getRandomModelId(Exam::class),
            'subject_id' => FactoryHelper::getRandomModelId(Subject::class),
            'grade_id' => FactoryHelper::getRandomModelId(Grade::class),
            'mark' => fake()->numberBetween(0, 500)
        ];
    }
}
