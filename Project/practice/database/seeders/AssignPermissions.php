<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class AssignPermissions extends Seeder
{
    public function run(): void
    {
        $adminRole = Role::findByName('admin');
        $editorRole = Role::findByName('editor');
        $viewerRole = Role::findByName('viewer');
        $subscriptionRole = Role::findByName('subscription');

        $viewPermission = Permission::findByName('view');
        $featureAccessPermission = Permission::findByName('feature access');
        $editPermission = Permission::findByName('edit');
        $deletePermission = Permission::findByName('delete');
        $createPermission = Permission::findByName('create');
        $updatePermission = Permission::findByName('update');

        $adminRole->syncPermissions([
            $viewPermission,
            $featureAccessPermission,
            $editPermission,
            $deletePermission,
            $createPermission,
            $updatePermission,
        ]);

        $editorRole->syncPermissions([
            $viewPermission,
            $editPermission,
            $createPermission,
            $updatePermission,
        ]);

        $viewerRole->syncPermissions([
            $viewPermission,
        ]);
        $subscriptionRole->syncPermissions([
            $viewPermission,
            $editPermission,
            $createPermission,
            $updatePermission,
            $featureAccessPermission,
        ]);
        $users = User::all();
        foreach ($users as $user) {
            $user->assignRole('viewer');
        }

    }
}
