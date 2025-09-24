<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\alert;

class UserController extends Controller
{
    //showing all users
    public function showUsers()
    {
        // $users = DB::table('users')->get();
        // $users = DB::table('users')->where('id', '>', 5)->get();
        // $users = DB::table('users')->orderBy('id')->simplePaginate(9);
        // $users = DB::table('users')->paginate(9, ['*'], 'p', 2);
        // $users = DB::table('users')->paginate(9)->appends(['sort' => 'votes', 'test' => 'abc']);
        $users = DB::table('users')->paginate(10)->fragment('users');
        // $users = DB::table('users')->orderBy('name')->simplePaginate(9);
        // dd($users);
        // dump($users);
        // return response()->json($users);
        return view('users', ['users' => $users]);
    }

    //showing single user
    public function singleUser($id)
    {
        $user = DB::table('users')->find($id);
        return view('profile', ['user' => $user]);
    }

    //adding new user
    public function addUser(Request $request)
    {
        $user = DB::table('users')
            ->insert([
                'name' => $request->name,
                'email' => $request->email,
                'age' => $request->age,
                'city' => $request->city,
            ]);
        if ($user) {
            return redirect('/users');
        } else {
            return redirect('/users')->withErrors("Failed to add user.");
        }

    }

    //updating user
    public function updateUser(Request $request, $id)
    {
        $user = DB::table('users')
            ->where('id', $id)
            ->update([
                'name' => $request->name,
                'email' => $request->email,
                'age' => $request->age,
                'city' => $request->city,
            ]);
        if ($user) {
            return redirect('/users');
        } else {
            echo "Failed to update user.";
        }
    }
    public function updatepage($id)
    {
        $user = DB::table('users')->find($id);
        return view('update', ['user' => $user]);
    }

    //deleting user
    public function deleteUser($id)
    {
        $user = DB::table('users')
            ->where('id', $id)
            ->delete();
        if ($user) {
            redirect('/users');
        } else {
            alert("Failed to delete user.");
        }
    }


    //deleting all users
    public function deleteAllUsers()
    {
        $users = DB::table('users')
            // ->delete();
            ->truncate();
        if ($users) {
            return redirect('/users');
        } else {
            return alert("Failed to delete all users.");
        }
    }

}
