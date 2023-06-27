<?php

namespace Database\Factories;

use App\Models\Student;
use Database\Factories\Helpers\FactoryHelper;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Accountment>
 */
class AccountmentFactory extends Factory
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
            'payments' => fake()->numberBetween(0, 10000000),
            'total' => function (array $attributes) {
                return fake()->numberBetween($attributes['payments'], 100000000);
            },
            'date_of_payment' => fake()->date()
        ];
    }
}
