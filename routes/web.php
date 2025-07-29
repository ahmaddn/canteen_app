<?php

use App\Http\Controllers\auth\AuthenticatedSessionController;
use App\Http\Controllers\auth\ForgotPasswordController;
use App\Http\Controllers\auth\RegisteredUserController;
use App\Http\Controllers\auth\ResetPasswordController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Authentication User
Route::get('/sign-in', [AuthenticatedSessionController::class, 'index'])->name('sign-in');
Route::post('/sign-in', [AuthenticatedSessionController::class, 'sign-in'])->name('login');
Route::get('/sign-up', [RegisteredUserController::class, 'index'])->name('sign-up');
Route::post('/sign-up', [RegisteredUserController::class, 'sign-up'])->name('register');

//Reset & Change Password
Route::get('/reset-password', [ResetPasswordController::class, 'index'])->name('reset-password');
Route::post('/reset-password', [ResetPasswordController::class, 'resetPassword']);
Route::get('/forgot-password', [ForgotPasswordController::class, 'index'])->name('forgot-password');
Route::post('/forgot-password', [ForgotPasswordController::class, 'forgotPassword   ']);
