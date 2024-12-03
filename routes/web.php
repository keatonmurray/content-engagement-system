<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthenticateUser;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LikesController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\SharesController;

Route::get('/', [PostsController::class, 'index'])->name('home')->middleware(AuthenticateUser::class);

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/user-registration', [AuthController::class, 'register_user'])->name('registration');
Route::post('/user-login', [AuthController::class, 'login_user'])->name('user-login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/post-status', [PostsController::class, 'store'])->name('post_status');

Route::post('/like', [LikesController::class, 'like_count']);
Route::post('/comment', [CommentsController::class, 'store']);
Route::get('/show-comment', [CommentsController::class, 'show']);
Route::get('/show-comment-count', [CommentsController::class, 'get_comment_count']);
Route::get('/share', [SharesController::class, 'share_post']);