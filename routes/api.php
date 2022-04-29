<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Rota Leitores
Route::resource('/readers', \App\Http\Controllers\Api\ReaderController::class);
Route::post('/store-read-book/{id}',
[\App\Http\Controllers\Api\ReaderController::class, 'storeReadBook'])->name('leitor.storeReadBook');

// Rota Livros
Route::resource('/books', \App\Http\Controllers\Api\BookController::class);
