<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/hello-world', [HomeController::class, 'helloWorld']);
Route::get('/about', [HomeController::class, 'about']);
Route::get('/login', [AuthController::class, 'login']);

// bisa kita panggil name nya di View
Route::get('/book', [BookController::class, 'index'])->name('book.index');
Route::get('/create-book', [BookController::class, 'create'])->name('book.create');
Route::post('/create-book', [BookController::class, 'store'])->name('book.store');
Route::get('/edit-book/{id}', [BookController::class, 'edit'])->name('book.edit');
Route::put('/edit-book/{id}', [BookController::class, 'update'])->name('book.update');
