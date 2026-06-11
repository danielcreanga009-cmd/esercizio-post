<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

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

Route::get('/posts/create', [PostController::class, 'createForm'])->name('createForm');

Route::post('/posts/create', [PostController::class, 'createPost'])->name('createPost');

Route::get('/posts/edit/{post}', [PostController::class, 'editForm'])->name('editForm');

Route::post('/posts/edit/{post}', [PostController::class, 'editPost'])->name('editPost');

Route::post('/posts/delete/{post}', [PostController::class, 'deletePost'])->name('deletePost');

Route::post('/home/{post}', [UserController::class, 'deletePostAdmin'])->name('deletePostAdmin')->middleware('admin');

Route::get('/home/search', [PostController::class, 'searchPost'])->name('ricerca');

Route::post('/like/{post}', [PostController::class, 'likePost'])->name('like')->middleware('auth');

Route::post('/comments/{post}', [CommentController::class, 'addComment'])->name('addComment');

//Route::post('/comments', [CommentController::class, 'showComments'])->name('showComments');
