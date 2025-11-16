<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            'admin',
            'editor',
            'viewer',
            'subscriber',
        ];
        $permissions = [
            'create',
            'view',
            'edit',
            'delete',
            'update',
            'feature access',
        ];
        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
