<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserPostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Home
Route::get('/', function () {
    return view('home');
})->name('home');


// Dashboard
Route::get('/dashboard', [
    UserController::class, 'dashboard'
]) -> name('dashboard') -> middleware('auth');

//Login
Route::get('/login', [LoginController::class, 'index']) -> name('login');
Route::post('/login', [LoginController::class, 'store']);

//Users
Route::get('/users/{user:username}', [UserPostController::class, 'index']) -> name('users.posts');

//Logout
Route::post('/logout', [LogoutController::class, 'store']) -> name('logout');

// Register 
Route::get('/register', [
    RegisterController::class, 'index'
]) -> name('register') -> middleware('guest');
Route::post('/register', [
    RegisterController::class, 'store'
]);

// Posts
Route::get('/posts', [PostController::class, 'index']) -> name('posts');
Route::post('/posts', [PostController::class, 'store']);
Route::delete('/posts/{post}/delete', [PostController::class, 'destroy'])->name('posts.delete');

//Post Detail
Route::get('/posts/{post}/', [PostController::class, 'show'])->name('posts.show');

//Likes
Route::post('/posts/{post}/likes', [PostLikeController::class, 'store']) -> name('posts.likes');
Route::delete('/posts/{post}/likes', [PostLikeController::class, 'destroy']);

// Friends
Route::post('{user}/add_friend', 'UserController@addFriend') -> name('addFriend'); 



