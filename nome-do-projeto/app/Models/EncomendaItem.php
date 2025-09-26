<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EncomendaItem extends Model
{
    protected $table = 'encomenda_itens'; // Corrigido
    protected $fillable = ['encomenda_id', 'produto_id', 'quantidade', 'preco_unitario', 'subtotal'];

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }
}
