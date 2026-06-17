<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;


//Auth routes
Route::get('/', [HomeController::class, 'index']);

Route::get('/signup', [AuthController::class, 'signupForm']);
Route::post('/signup', [AuthController::class, 'signup']);

Route::get('/signin', [AuthController::class, 'signinForm']);
Route::post('/signin', [AuthController::class, 'signin']);

Route::post('/logout', [AuthController::class, 'logout']);


//Dashboard routes
Route::get('/dashboard', [ProductController::class,'index'])->middleware('auth');

//Products
Route::get ('/products/create', [ProductController::class,'create'])->middleware('auth');
Route::post ('/products', [ProductController::class,'store'])->middleware('auth');
Route::get ('/products/{product}', [ProductController::class,'show']);
Route::get ('/products/{product}/edit', [ProductController::class,'edit'])->middleware('auth');
Route::put ('/products/{product}', [ProductController::class,'update'])->middleware('auth');
Route::delete ('/products/{product}', [ProductController::class,'destroy'])->middleware('auth');
Route::get ('/products/{product}/buy', [ProductController::class,'buy'])->middleware('auth');