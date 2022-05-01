<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/reader-login', [\App\Http\Controllers\Api\ReaderController::class, 'authenticate']);
Route::post('/admin-login', [\App\Http\Controllers\Api\AdminController::class, 'authenticate']);

// Rota Leitores
Route::resource('/readers', \App\Http\Controllers\Api\ReaderController::class);
Route::post('/store-read-book/{id}',
[\App\Http\Controllers\Api\ReaderController::class, 'storeReadBook'])->name('leitor.storeReadBook');

// Rota Livros
Route::resource('/books', \App\Http\Controllers\Api\BookController::class);
