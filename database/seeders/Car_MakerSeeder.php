<?php

namespace Database\Seeders;

use App\Models\Car_Maker;
use Illuminate\Database\Seeder;

class Car_MakerSeeder extends Seeder
{
    const CAR_MAKERS = [
        'Volkswagen',
        'Mercedes',
        'Ford',
        'BMW',
        'Citroen',
        'Opel',
        'Audi',
        'Skoda',
        'Smart'
    ];

    public function run(): void
    {
        foreach (self::CAR_MAKERS as $name) {
            Car_Maker::create([
                'name' => $name,
            ]);
        }
    }
}
