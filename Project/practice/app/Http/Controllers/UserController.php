<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed',
        ]);
        $user = User::create($validated);
        $token = $user->createToken('auth_token')->plainTextToken;
        dd($token);
        return redirect()->route('loginPage')->with('success', 'Registration successful! Please log in.');
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('auth_token')->plainTextToken;
            $posts = Post::all();
            session()->put('auth_token', $token);
            dd($token);
            return response()->json([
                'message' => 'Login successful',
                'user' => $user,
                'token' => $token,
                
            ]);
            return view('landingPage', compact('posts'));
        }


        return back()->withErrors([
            'error' => 'The provided credentials do not match our records.',
        ])->onlyInput('error');
    }

    public function extraFeature()
    {
        if (Auth::check()) {
            return view('extraFeature');
        }
        return redirect()->route('loginPage')->with('error', 'Please log in to access this feature.');
    }
    public function postregister(Request $request)
    {
        $validated = request()->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);
        $validated['user_id'] = Auth::id();
        Post::create($validated);
        return redirect()->route('landingPage')->with('success', 'Post created successfully.');
    }
    public function subscription(Request $request)
    {
        $user = User::find(Auth::id());
        $amount = request()->input('amount');
        $pid = request()->input('pid');
        $message = 'total_amount=' . $amount . ',transaction_uuid=' . $pid . ',product_code=EPAYTEST';
        $secrete = '8gBm/:&EnhH.1/q';
        $s = hash_hmac('sha256', $message, $secrete, true);
        $html = '<body>
        <form action="https://rc-epay.esewa.com.np/api/epay/main/v2/form" method="POST">
            <input type="hidden" id="amount" name="amount" value=' . $amount . ' required>
            <input type="hidden" id="tax_amount" name="tax_amount" value ="0" required>
            <input type="hidden" id="total_amount" name="total_amount" value=' . $amount . ' required>
            <input type="hidden" id="transaction_uuid" name="transaction_uuid" value="' . $pid . '" required>
            <input type="hidden" id="product_code" name="product_code" value ="EPAYTEST" required>
            <input type="hidden" id="product_service_charge" name="product_service_charge" value="0" required>
            <input type="hidden" id="product_delivery_charge" name="product_delivery_charge" value="0" required>
            <input type="hidden" id="success_url" name="success_url" value="https://developer.esewa.com.np/success" required>
            <input type="hidden" id="failure_url" name="failure_url" value="https://developer.esewa.com.np/failure" required>
            <input type="hidden" id="signed_field_names" name="signed_field_names" value="total_amount,transaction_uuid,product_code" required>
            <input type="hidden" id="signature" name="signature" value="' . base64_encode($s) . '" required>
            <input value="pay via eSewa" type="submit">
            </form>
            </body>';
        $user->assignRole('subscription');
        return $html;
    }
}