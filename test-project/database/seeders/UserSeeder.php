<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('123'), // Hash the password
            ],
            [
                'name' => 'teacher',
                'email' => 'teacher@gmail.com',
                'password' => Hash::make('123'),
            ],
            [
                'name' => 'student',
                'email' => 'student@gmail.com',
                'password' => Hash::make('123'),
            ],
        ];

        // Create users and assign roles
        foreach ($users as $userData) {
            $user = User::firstOrCreate(
                ['email' => $userData['email']], // Unique key to check existence
                [
                    'name' => $userData['name'],
                    'password' => $userData['password'],
                ]
            );

            // Assign role based on name
            $roleName = strtolower($userData['name']); // Match role name (admin, teacher, student)
            $user->assignRole($roleName);
        }
    }
}
