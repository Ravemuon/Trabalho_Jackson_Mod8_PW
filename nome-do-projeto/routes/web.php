<?php

    use App\Http\Controllers\CategoriaController;
    Route::resource('categorias', CategoriaController::class);

    use App\Http\Controllers\ProdutoController;
    Route::resource('produtos', ProdutoController::class);


