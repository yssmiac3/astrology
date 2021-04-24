<?php

namespace Database\Seeders;

use App\Models\Astrologist;
use Illuminate\Database\Seeder;

class AstrologistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Astrologist::factory()->count(5)->create();
    }
}
