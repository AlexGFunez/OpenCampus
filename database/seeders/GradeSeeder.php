<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Grade;
use App\Models\Enrollment;

class GradeSeeder extends Seeder
{
    public function run(): void
    {
        $enrollments = Enrollment::all();

        foreach ($enrollments as $enrollment) {
            Grade::factory()->count(4)->create([
                'enrollment_id' => $enrollment->id,
            ]);
        }
    }
}