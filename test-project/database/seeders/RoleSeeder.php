<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define permissions to be created
        $permissions = [
            // Student-related permissions
            'view_any_student',
            'view_student',
            'create_student',
            'update_student',
            'delete_student',
            // Grade-related permissions
            'view_any_grade',
            'view_grade',
            'create_grade',
            'update_grade',
            'delete_grade',
            // Teacher-related permissions (added for managing teachers)
            'view_any_teacher',
            'view_teacher',
            'create_teacher',
            'update_teacher',
            'delete_teacher',
        ];

        // Create permissions if they don’t exist
        foreach ($permissions as $permission) {
            Permission::findOrCreate($permission, 'web');
        }

        // Create roles and assign permissions
        $admin = Role::findOrCreate('admin', 'web');
        $admin->syncPermissions(Permission::all()); // Assign all permissions to admin

        $teacher = Role::findOrCreate('teacher', 'web');
        $teacher->syncPermissions([
            'view_any_student',
            'view_student',
            'create_student',
            'update_student',
            'delete_student',
            'view_any_grade',
            'view_grade',
            'create_grade',
            'update_grade',
            'delete_grade',
        ]);

        $student = Role::findOrCreate('student', 'web');
        $student->syncPermissions(['view_grade']);
    }
}
