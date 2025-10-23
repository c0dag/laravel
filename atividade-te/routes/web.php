<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProdutoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/produto', [ProdutoController::class, 'index'])->name('produtos.index');
Route::get('/produto/criar', [ProdutoController::class, 'criar'])->name('produtos.criar');
Route::post('/produto', [ProdutoController::class, 'salvar'])->name('produtos.salvar');

Route::get('/categoria', [CategoriaController::class, 'index']);
Route::post('/categoria', [CategoriaController::class, 'formulario'])->name('categoria');