<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Dashboard umum (default Breeze)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Admin dashboard + profil + data user
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users');

    Route::get('/admin/profile', [ProfileController::class, 'edit'])->name('admin.profile');
    Route::put('/admin/profile', [ProfileController::class, 'update'])->name('admin.profile.update');
});

// User dashboard + profil
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user/dashboard', function () {
        return view('user.dashboard');
    })->name('user.dashboard');

    Route::get('/user/profile', [ProfileController::class, 'edit'])->name('user.profile');
    Route::put('/user/profile', [ProfileController::class, 'update'])->name('user.profile.update');
});

require __DIR__.'/auth.php';
