<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/hello-world', [HomeController::class, 'helloWorld']);
Route::get('/about', [HomeController::class, 'about']);

Route::get('/login', [AuthController::class, 'login']);
