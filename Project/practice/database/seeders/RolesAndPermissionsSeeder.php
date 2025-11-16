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
        $permissions = [
            'view',
            'feature access',
            'edit',
            'delete',
            'create',
            'update',
        ];

        $roles = [
            'admin',
            'editor',
            'viewer',
            'subscription',
        ];

        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
