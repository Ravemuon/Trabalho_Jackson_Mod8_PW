<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PedidoFactory extends Factory
{
    protected $model = \App\Models\Pedido::class;

    public function definition()
    {
        return [
            'id_usuario' => \App\Models\User::inRandomOrder()->first()->id,
            'status' => $this->faker->randomElement(['pendente','concluido','cancelado']),
            'total' => 0, // será atualizado após criar os itens
            'data' => $this->faker->dateTimeBetween('-1 month', 'now'),
        ];
    }
}
