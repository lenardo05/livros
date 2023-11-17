<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LivroAutor;

class LivroAutorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LivroAutor::factory(12)->create();
    }
}
