<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Livro;
use App\Models\Autor;

class LivroAutorFactory extends Factory
{
    private static $order = 1;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'livro_id' => self::$order++,
            'autor_id' => Autor::pluck('id')->random(),
        ];
    }
}
