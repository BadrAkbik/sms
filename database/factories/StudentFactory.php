<?php

namespace Database\Factories;

use App\Models\Grade;
use App\Models\Section;
use Database\Factories\Helpers\FactoryHelper;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'address' => fake()->address(),
            'date_of_birth' => fake()->date(),
            'gender' => 'male',
            'phone_num' => fake()->phoneNumber(),
            'date_of_join' => fake()->date(),
            'grade_id' => FactoryHelper::getRandomModelId(Grade::class),
            'section_id' => FactoryHelper::getRandomModelId(Section::class),
        ];
    }
}
