<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Autor;

class AutorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Autor::factory(12)->create();
    }
}
