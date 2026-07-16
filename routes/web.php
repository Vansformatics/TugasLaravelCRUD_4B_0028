<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;

// Public Routes
// Landing Page 
Route::get('/', [PostController::class, 'index'])->name('post.index');

// Guest
Route::middleware(['guest'])->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected Routes
Route::middleware(['auth'])->group(function () {
    // CRUD
    Route::resource('post', PostController::class)->except(['index', 'show']);
});

// Membaca Detail Isi Berita
Route::get('/post/{post}', [PostController::class, 'show'])->name('post.show');