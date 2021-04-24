<?php

namespace Database\Seeders;

use App\Models\Astrologist;
use App\Models\Service;
use Illuminate\Database\Seeder;

class AstrologistServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = Service::all();

        Astrologist::all()->each(function ($astrologist) use ($services) {
            $astrologist->services()->attach(
                $services->random(mt_rand(1, 3))->pluck('id')
                ->mapWithKeys( function ($id) {
                    return [$id => ['price' => mt_rand(1, 100)]];
                })
            );
        });
    }
}
