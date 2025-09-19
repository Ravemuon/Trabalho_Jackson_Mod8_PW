<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Categoria; // <--- IMPORTAR AQUI
use App\Models\Produto;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Usuários
        // User::factory(10)->create();

        // Categorias
        // Categoria::factory(5)->create();

        // Produtos
        // Produto::factory(20)->create();
    }
}
