<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


// Index
Route::redirect('/', '/posts');

// User Post
Route::get('/{user}/post', [DashboardController::class, 'showUserPost'])->name('showUserPost');

// Reesource Post
Route::resource('posts', PostController::class);

// Guest User
Route::middleware('guest')->group(function () {

  // Register
  Route::view('/register', 'auth.register')->name('view_register');
  Route::post('/register', [AuthController::class, 'register'])->name('register');

  // Login
  Route::view('/login', 'auth.login')->name('view_login');
  Route::post('/login', [AuthController::class, 'login'])->name('login');
});

// Auth User
Route::middleware('auth')->group(function () {

  // Logout
  Route::post('logout', [AuthController::class, 'logout'])->name('logout');

  // Dashboard
  Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
  Route::get('/dashboard/posts', [DashboardController::class, 'posts'])->name('dashboard.posts');

  // Dashboard Profile
  Route::get('/dashboard/profile', [DashboardController::class, 'profile'])->name('dashboard.profile');
  Route::get('/dashboard/profile/{user}', [DashboardController::class, 'editProfile'])->name('dashboard.editProfile');
  Route::patch('/dashboard/profile/{user}', [DashboardController::class, 'updateProfile'])->name('dashboard.updateProfile');
  Route::delete('/dashboard/profile/{user}', [DashboardController::class, 'deleteProfileImage'])->name('dashboard.deleteProfileImage');
});
