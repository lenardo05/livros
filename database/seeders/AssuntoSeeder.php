<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Assunto;

class AssuntoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Assunto::factory(12)->create();
    }
}
