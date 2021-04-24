<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ([
            'Натальная карта',
            'Детальный гороскоп',
            'Отчет совместимости',
            'Гороскоп на год',
                 ] as $name) {
            Service::factory()->create([
                'name' => $name
            ]);
        }
    }
}
