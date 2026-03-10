<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Teacher;
use App\Models\AcademicPeriod;

class CourseFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->words(3, true),
            'code' => 'CUR-' . $this->faker->unique()->numberBetween(100,999),
            'description' => $this->faker->sentence(),
            'credits' => $this->faker->numberBetween(2,5),
            'teacher_id' => Teacher::factory(),
            'academic_periods_id' => AcademicPeriod::factory(),
            'capacity' => $this->faker->numberBetween(20,40),
            'status' => $this->faker->randomElement(['active','inactive']),
        ];
    }
}