<?php

namespace App\Services;

use App\Models\City;
use App\Models\WeatherLog;
use Illuminate\Support\Facades\Log;

class CityWeatherService
{
    public function fetchAndSave(City $city): ?WeatherLog
    {
        try {
            // Task 2: Integrate Weather API with Error Handling

        } catch (\Throwable $e) {
            Log::error("Weather fetch failed for city {$city->name}: " . $e->getMessage());
            return null;
        }
    }
}
