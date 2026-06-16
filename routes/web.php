<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/signup', [AuthController::class, 'signupForm']);
Route::post('/signup', [AuthController::class, 'signup']);

Route::get('/signin', [AuthController::class, 'signinForm']);
Route::post('/signin', [AuthController::class, 'signin']);

Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/dashboard', function () {
    if (auth()->user()->role === 'seller') {
        return view('dashboard.seller');
    } 
    return view('dashboard.customer');
})->middleware('auth');

Route::get ('/products/{product}', [ProductController::class,'show']);
Route::get ('/products/{product}/buy', [ProductController::class,'buy'])->middleware('auth');