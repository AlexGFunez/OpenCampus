<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Student;
use App\Models\Course;

class EnrollmentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'enrollment_date' => $this->faker->date(),
            'status' => $this->faker->randomElement(['inscrito','retirado','finalizado']),
            'final_average' => $this->faker->randomFloat(2, 60, 100),
            'student_id' => Student::factory(),
            'course_id' => Course::factory(),
        ];
    }
}