<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminLoginController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin login
//Creates a URL: http://127.0.0.1:8000/admin/login, click url and calls showLoginform from admincontroller.
Route::get('/admin/login', [AdminLoginController::class, 'showLoginForm'])
    ->name('admin.login');


//Handles the form submission from the admin login page
//ends the request to:AdminLoginController@login()
Route::post('/admin/login', [AdminLoginController::class, 'login'])
    ->name('admin.login.submit');

// Admin dashboard (ONLY admin can access)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

require __DIR__.'/auth.php';
