<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Faculty;


class StudentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'student_code' => 'STU-' . $this->faker->unique()->numberBetween(1000,9999),
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'semester' => $this->faker->numberBetween(1, 12),
            'status' => $this->faker->randomElement(['active','inactive']),
            'faculty_id' => Faculty::query()->inRandomOrder()->value('id'),
    ];
    }
}