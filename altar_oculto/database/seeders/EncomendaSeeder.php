<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Encomenda;
use App\Models\Usuario;
use Carbon\Carbon;

class EncomendaSeeder extends Seeder
{
    public function run(): void
    {
        $usuarios = Usuario::all();

        $encomendas = [
            [
                'usuario'        => 1,
                'nome_cliente'   => 'Administrador',
                'email_cliente'  => 'admin@site.com',
                'telefone_cliente' => '(49) 98888-8888',
                'endereco'       => 'Rua Central, 50 - Chapecó/SC',
                'total'          => 250.00,
                'observacoes'    => 'Pedido realizado pelo administrador.',
                'status'         => 'concluído',
                'created_at'     => Carbon::now()->subDays(10),
            ],
            [
                'usuario'        => 2,
                'nome_cliente'   => 'João da Silva',
                'email_cliente'  => 'joao@email.com',
                'telefone_cliente' => '(49) 99999-1111',
                'endereco'       => 'Rua das Flores, 120 - Chapecó/SC',
                'total'          => 85.50,
                'observacoes'    => 'Entregar após as 18h.',
                'status'         => 'pendente',
                'created_at'     => Carbon::now()->subDays(3),
            ],
            [
                'usuario'        => 2,
                'nome_cliente'   => 'Maria Oliveira',
                'email_cliente'  => 'maria@email.com',
                'telefone_cliente' => '(49) 97777-2222',
                'endereco'       => 'Avenida Brasil, 450 - Chapecó/SC',
                'total'          => 180.00,
                'observacoes'    => 'Cliente solicitou embalagem especial.',
                'status'         => 'enviado',
                'created_at'     => Carbon::now()->subDay(),
            ],
            [
                'usuario'        => 2,
                'nome_cliente'   => 'Carlos Ferreira',
                'email_cliente'  => 'carlos@email.com',
                'telefone_cliente' => '(49) 96666-3333',
                'endereco'       => 'Rua São Pedro, 80 - Chapecó/SC',
                'total'          => 320.90,
                'observacoes'    => 'Pedido grande para evento.',
                'status'         => 'confirmado',
                'created_at'     => Carbon::now(),
            ],
        ];

        foreach ($encomendas as $dados) {
            $usuario = $usuarios->find($dados['usuario']);

            Encomenda::create([
                'user_id'          => $usuario?->id,
                'nome_cliente'     => $dados['nome_cliente'],
                'email_cliente'    => $dados['email_cliente'],
                'telefone_cliente' => $dados['telefone_cliente'],
                'endereco'         => $dados['endereco'],
                'total'            => $dados['total'],
                'observacoes'      => $dados['observacoes'],
                'status'           => $dados['status'],
                'created_at'       => $dados['created_at'],
            ]);
        }
    }
}