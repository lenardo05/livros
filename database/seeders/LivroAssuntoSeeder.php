<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LivroAssunto;

class LivroAssuntoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LivroAssunto::factory(12)->create();
    }
}
