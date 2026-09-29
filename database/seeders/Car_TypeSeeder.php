<?php

namespace Database\Seeders;

use App\Models\Car_Type;
use App\Models\Car_Maker;
use Illuminate\Database\Seeder;

class Car_TypeSeeder extends Seeder
{
    public function run(): void
    {
        $car_makers = Car_Maker::all();

        foreach ($car_makers as $car_maker) {

            Car_Type::create([
                'name' => $car_maker->name . ' modell 1',
                'year' => '1000',
                'car_maker_id' => $car_maker->id,
            ]);

            Car_Type::create([
                'name' => $car_maker->name . ' modell 2',
                'year' => '2000',
                'car_maker_id' => $car_maker->id,
            ]);
        }
    }
}
