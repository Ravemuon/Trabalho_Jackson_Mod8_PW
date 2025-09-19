<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'descricao',
        'preco',
        'imagem',
        'categoria_id',
        'estoque',
        'codigo',
        'peso',
        'dimensoes',
        'tags',
        'popular',
        'ativo',
        'observacoes'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
