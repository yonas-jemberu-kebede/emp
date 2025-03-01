<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subjects = ['Maths', 'physics', 'biology'];

        foreach ($subjects as $subject) {
            Subject::create(['name' => $subject]);
        }

    }
}
