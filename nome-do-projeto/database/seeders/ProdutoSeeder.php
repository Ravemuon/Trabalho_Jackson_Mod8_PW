<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProdutoSeeder extends Seeder
{
    public function run(): void
    {
        \App\Models\User::factory(5)->create();
        $this->call(CategoriaSeeder::class);
        $this->call(ProdutoSeeder::class);
    }

}
