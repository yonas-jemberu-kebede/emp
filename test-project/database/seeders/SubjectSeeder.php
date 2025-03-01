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
        Subject::insert([
            [
                'name' => 'Maths',
            ],
            [
                'name' => 'physics',
            ],
            [
                'name' => 'biology',
            ],
        ]);

    }
}
