<?php

namespace Database\Seeders;

use App\Models\Faculty;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $faculties = [
            'ICC',
            'CIVIL',
            'INDUSTRIAL',
            'MEDICINA',
            'ENFERMERIA'
        ];

        foreach ($faculties as $faculty) {
            Faculty::create([
                'name' => $faculty
            ]);
        }
    }
}