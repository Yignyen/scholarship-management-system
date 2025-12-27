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
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // Scholarships placeholder
    Route::get('/scholarships', function () {
        return view('admin.scholarships.index');
    })->name('admin.scholarships.index');

    // Users placeholder
    Route::get('/users', function () {
        return view('admin.users.index');
    })->name('admin.users.index');

    // Applications placeholder
    Route::get('/applications', function () {
        return view('admin.applications.index');
    })->name('admin.applications.index');
});





require __DIR__.'/auth.php';
