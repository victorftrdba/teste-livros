<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Rota Leitores
Route::resource('/leitores', \App\Http\Controllers\Api\LeitorController::class);
Route::post('/adicionar-livro-lido',
[\App\Http\Controllers\Api\LeitorController::class, 'storeReadBook'])->name('leitor.storeReadBook');

// Rota Livros
Route::resource('/livros', \App\Http\Controllers\Api\LivroController::class);
