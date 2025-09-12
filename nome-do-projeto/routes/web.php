<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProdutoController;

// Rota da home
Route::get('/', function () {
    return view('welcome');
});

// Rotas para categorias e produtos
Route::resource('categorias', CategoriaController::class);
Route::resource('produtos', ProdutoController::class);
Route::get('/', [ProdutoController::class, 'home'])->name('home');
