<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produto>
 */
class ProdutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->word(),
            'preco' => $this->faker->randomFloat(2, 10, 1000),
            'quantidade' => $this->faker->numberBetween(1, 50),
            'user_id' => \App\Models\User::factory(),
            'categoria_id' => \App\Models\Categoria::factory(),
        ];
    }

}
