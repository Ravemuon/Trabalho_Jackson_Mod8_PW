<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    public function run(): void
    {

        Usuario::create([
            'nome' => 'Administrador',
            'email' => 'admin@altaroculto.com',
            'senha' => Hash::make('123456'),
            'fornecedor_id' => null,
            'imagem' => null,
        ]);


        Usuario::create([
            'nome' => 'João Silva',
            'email' => 'joao@email.com',
            'senha' => Hash::make('123456'),
            'fornecedor_id' => null,
            'imagem' => null,
        ]);


        Usuario::create([
            'nome' => 'Maria Oliveira',
            'email' => 'maria@email.com',
            'senha' => Hash::make('123456'),
            'fornecedor_id' => null,
            'imagem' => null,
        ]);

    }
}