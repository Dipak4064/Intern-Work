<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SignupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('signup');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('signup.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|confirmed',
        ]);
        // $user['password'] = bcrypt($user['password']); //we can use the casts() in models file for hashed password
        $user = User::create($user);
        if($user){
            return redirect()->route('signin.index');
        }else{
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified Request 
     */
    public function edit(Request $request)
    {
        //
    }

    /**
     * Update the specified Request  storage.
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified Request  storage.
     */
    public function destroy(Request $request)
    {
        //
    }
}
