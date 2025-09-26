<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\EncomendaController;
use App\Http\Controllers\CarrinhoController;

// -----------------------------
// HOME
// -----------------------------
Route::get('/', [ProdutoController::class, 'home'])->name('home');
// mostra a página inicial com produtos e categorias

// -----------------------------
// CATEGORIAS (CRUD)
// -----------------------------
Route::resource('categorias', CategoriaController::class);
// cria rotas index, create, store, show, edit, update, destroy

// -----------------------------
// PRODUTOS (CRUD)
// -----------------------------
Route::resource('produtos', ProdutoController::class);
// cria rotas index, create, store, show, edit, update, destroy

// -----------------------------
// CONTATO
// -----------------------------
Route::get('/contato', [ContatoController::class, 'index'])->name('contato.index');
// mostra formulário de contato
Route::post('/contato', [ContatoController::class, 'store'])->name('contato.store');
// envia dados do formulário

// -----------------------------
// ENCOMENDAS (CRUD)
// -----------------------------
Route::resource('encomendas', EncomendaController::class);
// rotas para listar, criar, editar e excluir encomendas

// -----------------------------
// CARRINHO (sessão)
// -----------------------------
Route::prefix('carrinho')->name('carrinho.')->group(function () {
    Route::post('/adicionar/{id}', [CarrinhoController::class, 'adicionar'])->name('adicionar');
    // adiciona produto ao carrinho

    Route::post('/remover/{id}', [CarrinhoController::class, 'remover'])->name('remover');
    // remove produto do carrinho

    Route::post('/limpar', [CarrinhoController::class, 'limpar'])->name('limpar');
    // limpa todo o carrinho
});
