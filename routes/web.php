<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;
use app\Http\Controllers\Controller;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get("/", [BookController::class, 'index'])->name('books.index');
Route::get("/books/{id}/show", [BookController::class, 'show'])->name('books.show'); 
