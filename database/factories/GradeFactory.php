<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Enrollment;

class GradeFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->randomElement(['Parcial 1','Parcial 2','Proyecto','Examen Final']),
            'description' => $this->faker->sentence(),
            'score' => $this->faker->randomFloat(2, 60, 100),
            'weight' => $this->faker->randomFloat(2, 10, 40),
            'evaluation_date' => $this->faker->date(),
            'enrollment_id' => Enrollment::factory(),
        ];
    }
}