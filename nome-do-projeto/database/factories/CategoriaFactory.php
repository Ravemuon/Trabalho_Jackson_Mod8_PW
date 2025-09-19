<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Categoria;

class CategoriaFactory extends Factory
{
    protected $model = Categoria::class;

    public function definition()
    {
        return [
            'nome' => $this->faker->unique()->words(2, true),
            'descricao' => $this->faker->sentence,
        ];
    }
}
