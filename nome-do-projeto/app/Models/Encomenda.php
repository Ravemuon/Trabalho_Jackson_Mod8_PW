<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Encomenda extends Model
{
    protected $fillable = ['nome_cliente', 'email_cliente', 'telefone_cliente', 'observacoes', 'total'];

    public function itens()
    {
        return $this->hasMany(EncomendaItem::class);
    }
}
