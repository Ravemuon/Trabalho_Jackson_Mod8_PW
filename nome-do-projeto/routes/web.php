<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\EncomendaController;
use App\Http\Controllers\CarrinhoController;

// -----------------------------
// Home
// -----------------------------
Route::get('/', [ProdutoController::class, 'home'])->name('home');

// -----------------------------
// Categorias (CRUD público)
// -----------------------------
Route::resource('categorias', CategoriaController::class);

// -----------------------------
// Produtos (CRUD público)
// -----------------------------
Route::resource('produtos', ProdutoController::class);

// -----------------------------
// Contato
// -----------------------------
Route::get('/contato', [ContatoController::class, 'index'])->name('contato.index');
Route::post('/contato', [ContatoController::class, 'store'])->name('contato.store');

// -----------------------------
// Encomendas (CRUD público)
// -----------------------------
Route::resource('encomendas', EncomendaController::class);

// -----------------------------
// Carrinho (manipulação de sessão)
// -----------------------------
Route::prefix('carrinho')->name('carrinho.')->group(function () {
    Route::post('/adicionar/{id}', [CarrinhoController::class, 'adicionar'])->name('adicionar');
    Route::post('/remover/{id}', [CarrinhoController::class, 'remover'])->name('remover');
    Route::post('/limpar', [CarrinhoController::class, 'limpar'])->name('limpar');
});
