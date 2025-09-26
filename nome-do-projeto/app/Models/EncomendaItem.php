<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EncomendaItem extends Model
{
    protected $table = 'encomenda_itens'; // define a tabela correta
    protected $fillable = ['encomenda_id', 'produto_id', 'quantidade', 'preco_unitario', 'subtotal']; // campos preenchíveis

    // RELAÇÃO COM PRODUTO (cada item pertence a um produto)
    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }
}
