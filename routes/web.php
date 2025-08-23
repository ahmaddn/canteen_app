<?php

use App\Http\Controllers\auth\AuthenticatedSessionController;
use App\Http\Controllers\auth\ForgotPasswordController;
use App\Http\Controllers\auth\RegisteredUserController;
use App\Http\Controllers\auth\ResetPasswordController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
})->middleware('guest');

// Authentication User
Route::get('/sign-in', [AuthenticatedSessionController::class, 'index'])->middleware('guest')->name('sign-in');
Route::post('/sign-in', [AuthenticatedSessionController::class, 'signIn'])->middleware('guest')->name('login');
Route::get('/sign-up', [RegisteredUserController::class, 'index'])->middleware('guest')->name('sign-up');
Route::post('/sign-up', [RegisteredUserController::class, 'signUp'])->middleware('guest')->name('register');
Route::post('/sign-out', [AuthenticatedSessionController::class, 'signOut'])->middleware('auth')->name('sign-out');

// Reset & Change Password
Route::get('/reset-password/{email}', [ResetPasswordController::class, 'index'])->middleware('guest')->name('reset-password');
Route::post('/reset-password/{email}', [ResetPasswordController::class, 'resetPassword'])->middleware('guest')->name('reset-submit');
Route::get('/forgot-password', [ForgotPasswordController::class, 'index'])->middleware('guest')->name('forgot-password');
Route::post('/forgot-password', [ForgotPasswordController::class, 'forgotPassword'])->middleware('guest')->name('forgot-submit');

// Dashboard
Route::get('/dashboard', [ProductsController::class, 'dashboard'])->middleware('auth')->name('dashboard');

Route::middleware(['auth'])->group(function () {
    // Categories
    Route::get('/categories', [CategoriesController::class, 'index'])->name('categories.index');
    Route::get('/categories/add', [CategoriesController::class, 'add'])->name('categories.add');
    Route::post('/categories/add', [CategoriesController::class, 'store'])->name('categories.store');
    Route::get('/categories/{id}', [CategoriesController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{id}', [CategoriesController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{id}', [CategoriesController::class, 'destroy'])->name('categories.delete');

    // Products
    Route::get('/products', [ProductsController::class, 'index'])->name('products.index');
    Route::get('/products/add', [ProductsController::class, 'add'])->name('products.add');
    Route::post('/products/add', [ProductsController::class, 'store'])->name('products.store');
    Route::get('/products/{id}', [ProductsController::class, 'edit'])->name('products.edit');
    Route::put('/products/{id}', [ProductsController::class, 'update'])->name('products.update');
    Route::delete('/products/{id}', [ProductsController::class, 'destroy'])->name('products.delete');
});
