<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Produto;
use App\Models\Categoria; // <--- IMPORTAR AQUI

class ProdutoFactory extends Factory
{
    protected $model = Produto::class;

    public function definition()
    {
        return [
            'nome' => $this->faker->unique()->words(2, true),
            'descricao' => $this->faker->sentence,
            'preco' => $this->faker->randomFloat(2, 10, 200),
            'imagem' => 'https://source.unsplash.com/400x300/?mystic,magic',
            'categoria_id' => Categoria::inRandomOrder()->first()->id,
        ];
    }
}
