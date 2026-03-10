<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TeacherFactory extends Factory
{
    public function definition(): array
    {
        return [
            'employee_code' => 'EMP-' . $this->faker->unique()->numberBetween(1000,9999),
            'specialty' => $this->faker->randomElement([
                'Matemáticas',
                'Programación',
                'Física',
                'Base de Datos',
                'Redes'
            ]),
            'hire_date' => $this->faker->date(),
            'status' => $this->faker->randomElement(['active','inactive']),
        ];
    }
}