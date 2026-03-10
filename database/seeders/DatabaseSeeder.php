<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
        FacultySeeder::class,
        AcademicPeriodSeeder::class,
        TeacherSeeder::class,
        StudentSeeder::class,
        CourseSeeder::class,
        EnrollmentSeeder::class,
        GradeSeeder::class,
        ]);
    }
}