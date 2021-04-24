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
//            dd($services->random(mt_rand(1, 3))->pluck('id')
//                ->map( function ($id) {
//                    return [$id => ['price' => mt_rand(1, 100)]];
//                })
//            ->collapse());
            $astrologist->services()->attach(

                $services->random(mt_rand(1, 3))->pluck('id')
                ->mapWithKeys( function ($id) {
                    return [$id => ['price' => mt_rand(1, 100)]];
                })

//                    array_map(
//                        fn($x) => [$x => ['price' => mt_rand(1, 100)]],
//                        $services->random(mt_rand(1, 3))->pluck('id')->toArray()
//                    )

            );
        });
    }
}
