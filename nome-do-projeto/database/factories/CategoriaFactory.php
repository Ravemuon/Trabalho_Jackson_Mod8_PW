<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoriaFactory extends Factory
{
    protected $model = \App\Models\Categoria::class;

    public function definition(): array
    {
        $nomes = ['Velas', 'Amuletos', 'Cristais', 'Imagens Religiosas'];
        return [
            'nome' => $this->faker->unique()->randomElement($nomes),
            'descricao' => $this->faker->sentence(),
        ];
    }
}
