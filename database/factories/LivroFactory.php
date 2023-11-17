<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LivroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titulo' => $this->faker->sentence(1),			
            'editora' => $this->faker->unique()->lastName(),
            'edicao' => $this->faker->unique()->numberBetween(1, 12),
            'ano_publicacao' => $this->faker->unique()->numberBetween(2000, 2021)
        ];
    }
}
