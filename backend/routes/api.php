<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/reader-login', [\App\Http\Controllers\Api\ReaderController::class, 'authenticate']);
Route::post('/admin-login', [\App\Http\Controllers\Api\AdminController::class, 'authenticate']);

// Rota Leitores
Route::middleware('auth:sanctum')->resource('/readers', \App\Http\Controllers\Api\ReaderController::class);
Route::middleware('auth:sanctum')->post('/store-read-book/{id}',
[\App\Http\Controllers\Api\ReaderController::class, 'storeReadBook'])->name('leitor.storeReadBook');

// Resgatar livros do leitor pelo Redis
Route::middleware('auth:sanctum')
    ->get('/readers/see-reader-books/{id}', [\App\Http\Controllers\Api\ReaderController::class, 'seeReaderBooks']);

// Rota Livros
Route::middleware('auth:sanctum')->resource('/books', \App\Http\Controllers\Api\BookController::class);
