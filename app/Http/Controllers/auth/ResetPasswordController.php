<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    public function index($email)
    {
        return view("auth.reset-password", compact('email'));
    }

    public function resetPassword(Request $request, $email)
    {
        $request->validate([
            'password' => 'required|string|min:8|confirmed'
        ]);

        $user = User::where('email', $email)->first();


        if (!$user) {
            return back()->with('error', 'User not Found!');
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('sign-in')->with('success', 'Password has been reset.  ');
    }
}
