<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Estudiante']);
        $role3 = Role::create(['name' => 'Academico']);

        Permission::create(['name' => 'admin'])->syncRoles([$role]);
    }
}
