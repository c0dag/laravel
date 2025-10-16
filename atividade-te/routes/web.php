<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProdutoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/categoria', [CategoriaController::class, 'index']);
Route::post('/categoria', [CategoriaController::class, 'formulario'])->name('categoria');
Route::get('/produto', [ProdutoController::class, 'index']);
Route::post('/produto', [ProdutoController::class, 'index']);