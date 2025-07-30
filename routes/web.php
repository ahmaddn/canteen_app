<?php

use App\Http\Controllers\auth\AuthenticatedSessionController;
use App\Http\Controllers\auth\ForgotPasswordController;
use App\Http\Controllers\auth\RegisteredUserController;
use App\Http\Controllers\auth\ResetPasswordController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.sign-in');
})->middleware('guest');

// Authentication User
Route::get('/sign-in', [AuthenticatedSessionController::class, 'index'])->middleware('guest')->name('sign-in');
Route::post('/sign-in', [AuthenticatedSessionController::class, 'signIn'])->middleware('guest')->name('login');
Route::get('/sign-up', [RegisteredUserController::class, 'index'])->middleware('guest')->name('sign-up');
Route::post('/sign-up', [RegisteredUserController::class, 'signUp'])->middleware('guest')->name('register');
Route::post('/sign-out', [AuthenticatedSessionController::class, 'signOut'])->middleware('auth')->name('sign-out');

//Reset & Change Password
Route::get('/reset-password/{email}', [ResetPasswordController::class, 'index'])->middleware('guest')->name('reset-password');
Route::post('/reset-password/{email}', [ResetPasswordController::class, 'resetPassword'])->middleware('guest')->name('reset-submit');
Route::get('/forgot-password', [ForgotPasswordController::class, 'index'])->middleware('guest')->name('forgot-password');
Route::post('/forgot-password', [ForgotPasswordController::class, 'forgotPassword'])->middleware('guest')->name('forgot-submit');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');
