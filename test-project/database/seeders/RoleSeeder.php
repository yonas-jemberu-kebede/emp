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
        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo(Permission::get());

        $teacher = Role::create(['name' => 'teacher']);
        $teacher->givePermissionTo([
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

        $student = Role::create(['name' => 'student']);
        $student->givePermissionTo('view_grade');

    }
}
