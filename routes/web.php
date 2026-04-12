<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [UserController::class, 'registerForm'])->name('registerForm');

Route::post('/register', [UserController::class, 'registerUser'])->name('registerUser');

Route::get('/home',[UserController::class, 'showHome'])->name('home');

Route::get('/login', [UserController::class, 'loginForm'])->name('login');

Route::post('/login', [UserController::class, 'loginUser'])->name('loginUser');

Route::get('/posts', [PostController::class, 'showPosts'])->name('showPosts')->middleware('auth');

Route::get('/logout', [UserController::class, 'logout'])->name('logout');