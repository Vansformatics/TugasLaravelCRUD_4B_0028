<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

// Rute Landing Page
Route::get('/', [PostController::class, 'index'])->name('post.index');

// Rute CRUD untuk Post
Route::resource('post', PostController::class)->except(['index']);