<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\WelcomeEmailInterface;
use Illuminate\Support\Facades\Crypt;

class SignupController extends Controller
{
    protected $service;
    public function __construct(WelcomeEmailInterface $service)
    {
        $this->service = $service;
    }
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
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|indisposable|unique:users,email',
            'password' => 'required|string|confirmed',
            'g-recaptcha-response' => ['required', new \App\Rules\InReCaptcha()],
        ]);
        $link = Crypt::encryptString($validated['email']);
        $link = url('/verify-email/' . $link);
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'],
        ]);

        if ($user) {
            $this->service->sendWelcomeEmail($user->name, $user->email, 'Welcome Email!', $link);
            return redirect()->route('signin.index')->with('message', 'Account created successfully! Please sign in.');
        } else {
            return back()->withInput();
        }
    }
    function verifyEmail($token)
    {
        $email = Crypt::decryptString($token);
        $user = User::where('email', $email)->latest()->first();
        if ($user) {
            $user->email_verified_at = now();
            $user->email_verified_status = 'verified';
            $user->save();
            return redirect()->route('signin.index')->with('message', 'Email verified successfully! You can now sign in.');
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
