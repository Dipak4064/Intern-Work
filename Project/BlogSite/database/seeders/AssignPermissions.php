<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class AssignPermissions extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Admin = Role::findByName('admin');
        $Editor = Role::findByName('editor');
        $Viewer = Role::findByName('viewer');
        $Subscriber = Role::findByName('subscriber');

        $Create = Permission::findByName('create');
        $View = Permission::findByName('view');
        $Edit = Permission::findByName('edit');
        $Update = Permission::findByName('update');
        $FeatureAccess = Permission::findByName('feature access');

        $Admin->syncPermissions([
            $Create,
            $View,
            $Edit,
            $Update,
            $FeatureAccess,
        ]);
        $Editor->syncPermissions([
            $Create,
            $View,
            $Edit,
            $Update,
        ]);
        $Viewer->syncPermissions([
            $View,
        ]);
        $Subscriber->syncPermissions([
            $FeatureAccess,
        ]);
        User::all()->each(function ($user) {
            $user->assignRole($user->role);
        });
    }
}
