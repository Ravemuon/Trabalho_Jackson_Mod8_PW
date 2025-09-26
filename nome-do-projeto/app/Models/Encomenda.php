<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Encomenda extends Model
{
    // CAMPOS QUE PODEM SER PREENCHIDOS EM MASSA
    protected $fillable = ['nome_cliente', 'email_cliente', 'telefone_cliente', 'observacoes', 'total'];

    // RELAÇÃO COM ITENS (uma encomenda tem muitos itens)
    public function itens()
    {
        return $this->hasMany(EncomendaItem::class);
    }
}
