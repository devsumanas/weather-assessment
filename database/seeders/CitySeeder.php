<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\City;

class CitySeeder extends Seeder
{
    public function run(): void
    {
        $cities = ['London', 'Chennai', 'Mumbai', 'Madurai'];

        foreach ($cities as $city) {
            City::firstOrCreate(['name' => $city]);
        }
    }
}
