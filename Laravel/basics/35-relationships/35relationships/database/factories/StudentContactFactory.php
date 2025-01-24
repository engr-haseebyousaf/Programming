<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StudentContact>
 */
class StudentContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "studentEmail" => fake()->unique()->email(),
            "studentPhone" => fake()->unique()->phoneNumber(),
            "studentAddress" => fake()->address(),
            "studentCity" => fake()->city(),
            "studentTableId" => Student::factory(),
        ];
    }
}
