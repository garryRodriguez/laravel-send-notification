<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/books', [BookController::class, 'index']);
Route::get('/book/{id}', [BookController::class, 'show']);
Route::post('/book/details', [BookController::class, 'Store']);
Route::put('/books/update/{id}', [BookController::class, 'update']);
Route::delete('book/delete/{id}', [BookController::class, 'destroy']);
