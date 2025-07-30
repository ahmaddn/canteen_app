<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class AuthenticatedSessionController extends Controller
{
    public function index()
    {
        return view("auth.sign-in");
    }

    public function signIn(Request $request)
    {
        $request->validate([
            'email' => 'required|email|string|lowercase|max:255',
            'password' => 'required|string|min:8',
        ]);

        $credentials = $request->only('email', 'password');
        $remember_me = $request->has('remember_me');

        if (Auth::attempt($credentials, $remember_me)) {
            if ($remember_me) {
                Cookie::queue('remember_email', $request->email, 10080);
                Cookie::queue('remember_password', $request->password, 10080);
            } else {
                Cookie::queue(Cookie::forget('remember_email'));
                Cookie::queue(Cookie::forget('remember_password'));
            }
            return redirect()->route('dashboard')->with('success', 'Sign In Successfully!');
        }

        return back()->with('error', 'Invalid Credentials')->withInput();
    }

    public function signOut(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
