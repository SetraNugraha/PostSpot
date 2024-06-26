<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // Validate
        $userValidated =  $request->validate([
            'username' => ['required', 'max:50'],
            'email' => ['required', 'max:70', 'email', 'unique:users'],
            'password' => ['required', 'min:3', 'confirmed'],
        ]);

        // Register user to DB
        $user = User::create($userValidated);

        //Login
        Auth::login($user);

        // Redirect
        return redirect()->route('posts.index');
    }

    public function login(Request $request)
    {
        // Validate
        $userValidated = $request->validate([
            'email' => ['required', 'max:70', 'email'],
            'password' => ['required']
        ]);

        // Try to login
        if (Auth::attempt($userValidated)) {
            // intended -> redirect to latest page
            return redirect()->intended();
        } else {
            return back()->withErrors([
                'failed' => "Email or Password Doesn't Match ! "
            ]);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->intended();
    }
}
