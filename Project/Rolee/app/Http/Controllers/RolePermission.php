<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RolePermission extends Controller
{
    public function openRolesPage()
    {
        $roles = Role::all();
        return view('rolesTable', compact('roles'));
    }
    public function openCreateRolePage()
    {
        return view('roleCreate');
    }
    public function storeRole(Request $request)
    {
        $role = $request->input('name');
        Role::create([
            'name' => $role
        ]);
        session()->flash('success', 'Role created successfully.');
        return redirect()->route('welcome');
    }

    public function openPermissionsPage()
    {
        $permissions = Permission::all();
        return view('permissionTable', compact('permissions'));
    }
    public function openCreatePermissionPage()
    {
        return view('permissionCreate');
    }
    public function storePermission(Request $request)
    {
        $permission = $request->input('name');
        Permission::create([
            'name' => $permission
        ]);
        session()->flash('success', 'Permission created successfully.');
        return redirect()->route('permissions.page');
    }
}
