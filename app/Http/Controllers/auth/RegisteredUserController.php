<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    public function index()
    {
        return view("auth.sign-up");
    }

    public function signUp(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users|lowercase',
            'class' => 'required|string',
            'password' => 'required|string|min:8',
            'birthday' => 'required|date',
            'gender' => 'required|in:L,P',
            'address' => 'required|string',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'class' => $request->class,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
            'birthday' => $request->birthday,
            'address' => $request->address,
        ]);

        return redirect()->route('sign-in')->with('success', 'Registered User Successfully!');
    }
}
