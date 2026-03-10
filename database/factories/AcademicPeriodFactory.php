<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AcademicPeriodFactory extends Factory
{
    public function definition(): array
    {
        static $year = 2020;
        static $semesterIndex = 0;

        $semesters = ['I', 'II'];

        $name = $year . '-' . $semesters[$semesterIndex];

        $semesterIndex++;

        if ($semesterIndex >= 2) {
            $semesterIndex = 0;
            $year++;
        }

        return [
            'name' => $name,
            'start_date' => now(),
            'end_date' => now()->addMonths(6),
            'status' => 'active',
        ];
    }
}