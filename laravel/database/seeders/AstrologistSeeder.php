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
        $all = Astrologist::factory()->count(5)->create();

        $all->each( function ($item) {
           $item->photo_url = $item->id;
           $item->save();
        });
    }
}
