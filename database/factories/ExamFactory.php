<?php

namespace Database\Factories;

use App\Models\ExamType;
use App\Models\Subject;
use Database\Factories\Helpers\FactoryHelper;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Exam>
 */
class ExamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date' => fake()->dateTimeThisYear(),
            'semester' => fake()->randomElement(['fisrt', 'second']),
            'type' => fake()->name(),
            'subject_id' => FactoryHelper::getRandomModelId(Subject::class)
        ];
    }
}
