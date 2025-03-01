<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Seeder;
use Database\Seeders\TeacherSeeder;
use Database\Seeders\StudentSeeder;
use Database\Seeders\GradeSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            TeacherSeeder::class,
            StudentSeeder::class,
            GradeSeeder::class,
            SubjectSeeder::class,
        ]);
    }
}
