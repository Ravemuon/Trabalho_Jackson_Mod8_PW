<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ItemPedidoFactory extends Factory
{
    protected $model = \App\Models\ItemPedido::class;

    public function definition()
    {
        $produto = \App\Models\Produto::inRandomOrder()->first();
        $quantidade = $this->faker->numberBetween(1, 5);

        return [
            'id_pedido' => \App\Models\Pedido::inRandomOrder()->first()->id,
            'id_produto' => $produto->id,
            'quantidade' => $quantidade,
            'subtotal' => $produto->preco * $quantidade,
        ];
    }
}
