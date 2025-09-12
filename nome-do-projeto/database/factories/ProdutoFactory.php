<?php

namespace Database\Factories;

use App\Models\Categoria;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProdutoFactory extends Factory
{
    protected $model = \App\Models\Produto::class;

    public function definition(): array
    {
        $categoria = Categoria::inRandomOrder()->first() ?? Categoria::factory()->create();

        return [
            'nome' => $this->faker->unique()->word().' Místico',
            'descricao' => $this->faker->sentence(),
            'preco' => $this->faker->randomFloat(2, 10, 100),
            'imagem' => 'https://source.unsplash.com/400x300/?mystic,magic',
            'categoria_id' => $categoria->id,
        ];
    }
}
