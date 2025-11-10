<?php

use App\Http\Controllers\RolePermission;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/roles', [RolePermission::class, "openRolesPage"])->name('roles.page');
Route::get('/roles/create', [RolePermission::class, "openCreateRolePage"])->name('roles.create');
Route::post('roles', [RolePermission::class, "storeRole"])->name('roles.store');

Route::get('/permissions', [RolePermission::class, "openPermissionsPage"])->name('permissions.page');
Route::get('/permissions/create', [RolePermission::class, "openCreatePermissionPage"])->name('permissions.create');
Route::post('permissions', [RolePermission::class, "storePermission"])->name('permissions.store');

Route::get('assign-permissions', function () {
    $user = User::find(2);
    $permissions = Permission::findByName('write article');
    // $user->givePermissionTo($permissions);
    // dd('Permission assigned successfully');
    // $permission = $user->getPermissionNames();
    $user->revokePermissionTo();
    dd('Revokeed permission successfully');
    dd($user->getPermissionNames());
})->name('assign.permissions');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});