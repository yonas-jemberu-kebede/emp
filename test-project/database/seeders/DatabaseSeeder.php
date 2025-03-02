<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Spatie\Permission\Models\Permission;
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
            Roleseeder::class,
            UserSeeder::class,

        ]);


        $this->call([
            RoleSeeder::class,
        ]);
    }
}
