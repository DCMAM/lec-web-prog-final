<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('signin');
});

Route::get('/register', function () {
    return view('signup');
});

// Redirects
Route::redirect('/login', '/signin');

// home
Route::get('/home', [\App\Http\Controllers\BookController::class, 'showBooks']);

// Sign up
Route::get('/signup', function () {
    return view('signup');
})->middleware('guest');

Route::post('/signup', [\App\Http\Controllers\UserController::class, 'userRegister']);

// Sign in
Route::get('/signin', function () {
    return view('signin');
})->middleware('guest');

Route::post('/signin', [\App\Http\Controllers\UserController::class, 'userLogin']);

// Sign in
Route::post('/signout', [\App\Http\Controllers\UserController::class, 'userLogout']);

