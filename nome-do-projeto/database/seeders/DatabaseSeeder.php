<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;
use App\Models\Produto;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Cria categorias
        Categoria::factory(4)->create();

        // Cria produtos
        Produto::factory(20)->create();
    }
}
