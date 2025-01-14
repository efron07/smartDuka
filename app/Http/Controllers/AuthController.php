<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
{
    $request->validate([
        'phone' => 'required|string',
        'password' => 'required|min:8',
    ]);

    // Attempt to authenticate using the phone and password
    if (Auth::attempt(['phone' => $request->phone, 'password' => $request->password], $request->remember)) {
        return redirect()->intended('/dashboard');
    }

    return back()->withErrors(['phone' => 'Invalid credentials.']);
}

    public function showSignup()
    {
        return view('auth.signup');
    }

    public function signup(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|unique:users',
            'password' => 'required|min:8|confirmed',
            'business' => 'nullable|string|max:255',
        ]);

        $user = User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'business' => $request->business,
            'password' => Hash::make($request->password),
            'role' => $request->role ?? 'stock_person', 
        ]);

        Auth::login($user);

        return redirect('/dashboard');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
