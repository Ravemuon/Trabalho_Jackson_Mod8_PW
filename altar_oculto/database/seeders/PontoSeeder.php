<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ponto;

class PontoSeeder extends Seeder
{
    public function run(): void
    {

        Ponto::create([
            'nome' => 'Ponto de Oxalá',
            'tipo' => 'cantado',
            'entidade' => 'Oxalá',
            'funcao' => 'abertura',
            'letra' => "Oxalá é a luz que ilumina\nNos caminhos da paz e da vida",
            'simbolo' => null,
            'categoria_id' => 1,
            'descricao' => 'Ponto de abertura de Oxalá',
            'audio' => null
        ]);


        Ponto::create([
            'nome' => 'Ponto de Iemanjá',
            'tipo' => 'cantado',
            'entidade' => 'Iemanjá',
            'funcao' => 'abertura',
            'letra' => "Salve Iemanjá!\nRainha das águas!",
            'simbolo' => null,
            'categoria_id' => 2,
            'descricao' => 'Ponto de saudação à Iemanjá',
            'audio' => null
        ]);


        Ponto::create([
            'nome' => 'Ponto de Ogum',
            'tipo' => 'cantado',
            'entidade' => 'Ogum',
            'funcao' => 'abertura',
            'letra' => "Ogum é guerreiro\nabre os caminhos",
            'simbolo' => null,
            'categoria_id' => 3,
            'descricao' => 'Ponto de Ogum para proteção e força',
            'audio' => null
        ]);


        Ponto::create([
            'nome' => 'Ponto de Xangô',
            'tipo' => 'cantado',
            'entidade' => 'Xangô',
            'funcao' => 'abertura',
            'letra' => "Xangô, justiceiro\ntraz o equilíbrio",
            'simbolo' => null,
            'categoria_id' => 4,
            'descricao' => 'Ponto de Xangô para justiça e coragem',
            'audio' => null
        ]);


        Ponto::create([
            'nome' => 'Ponto de Oxóssi',
            'tipo' => 'cantado',
            'entidade' => 'Oxóssi',
            'funcao' => 'abertura',
            'letra' => "Oxóssi caçador\nabre os caminhos da fartura",
            'simbolo' => null,
            'categoria_id' => 5,
            'descricao' => 'Ponto de Oxóssi para prosperidade',
            'audio' => null
        ]);


        Ponto::create([
            'nome' => 'Ponto de Caboclo',
            'tipo' => 'cantado',
            'entidade' => 'Caboclo',
            'funcao' => 'abertura',
            'letra' => "Caboclo sábio\nguias da mata e da cura",
            'simbolo' => null,
            'categoria_id' => 6,
            'descricao' => 'Ponto de Caboclo para proteção e sabedoria',
            'audio' => null
        ]);


        Ponto::create([
            'nome' => 'Ponto de Exu',
            'tipo' => 'cantado',
            'entidade' => 'Exu',
            'funcao' => 'abertura',
            'letra' => "Exu senhor dos caminhos\nabre as encruzilhadas",
            'simbolo' => null,
            'categoria_id' => 8,
            'descricao' => 'Ponto de Exu para abertura de caminhos',
            'audio' => null
        ]);

    }
}