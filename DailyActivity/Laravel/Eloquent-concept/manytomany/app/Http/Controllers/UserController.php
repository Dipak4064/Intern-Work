<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('roles')->get();
        // return response()->json($user);
        foreach($users as $user){
            echo "User Name: ".$user->name."<br>";
            foreach($user->roles as $role){
                echo "Role Name: ".$role->role_name."<br>";
            }
            echo "<br>";
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::find(2);
        $user ->roles()->attach([1, 2]); // Attach roles with IDs 1 and 2 to the user
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

class UserController extends Controller{
    public function create()
    {
        $user = User::find(2);
        // $roles = [1, 2];
        // $user->roles()->attach([1, 2]); // Attach roles with IDs 1 and 2 to the user
        // $user->roles()->sync($roles); // Sync roles with IDs 1 and 2 to the user
        // $user->roles()->detach(); // Detach role with ID 3 from the user
        // $user->roles()->sync([1, 2]); // Sync roles with IDs 1 and 2 to the user
        $user->roles()->sync(3); // delete role with ID 3 to the user
        
    }
}