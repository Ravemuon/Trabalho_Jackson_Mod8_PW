<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
        public function run(): void
    {
        \App\Models\User::factory(5)->create();
        $this->call(CategoriaSeeder::class);
        $this->call(ProdutoSeeder::class);
    }

}
