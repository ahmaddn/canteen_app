<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    public function index()
    {
        return view("auth.forgot-password");
    }

    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->email)->first();


        if (!$user) {
            return response()->view('errors.404', ['error' => 'User not found!'], 404);
        }


        return redirect()->route('reset-password', ['email' => $request->email]);
    }
}
