<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\EncomendaController;

// -----------------------------
// Home
// -----------------------------
Route::get('/', [ProdutoController::class, 'home'])->name('home');

// -----------------------------
// Categorias (CRUD completo público)
// -----------------------------
Route::resource('categorias', CategoriaController::class);

// -----------------------------
// Produtos (CRUD completo público)
// -----------------------------
Route::resource('produtos', ProdutoController::class);

// -----------------------------
// Contato
// -----------------------------
Route::get('/contato', [ContatoController::class, 'index'])->name('contato.index');
Route::post('/contato', [ContatoController::class, 'store'])->name('contato.store');

// -----------------------------
// Encomendas (CRUD completo público)
// -----------------------------
Route::resource('encomendas', EncomendaController::class);
