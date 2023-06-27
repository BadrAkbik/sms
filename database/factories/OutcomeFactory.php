<?php

namespace Database\Factories;

use App\Models\Student;
use App\Models\Subject;
use Database\Factories\Helpers\FactoryHelper;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Outcome>
 */
class OutcomeFactory extends Factory
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
            'subject_id' => FactoryHelper::getRandomModelId(Subject::class),
            'first_sem' => fake()->numberBetween(500, 3000),
            'second_sem' => fake()->numberBetween(500, 3000),
            'total' => function (array $attributes) {
                return $attributes['first_sem'] + $attributes['second_sem'];
            }
        ];
    }
}
