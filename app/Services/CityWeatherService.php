<?php

namespace App\Services;

use App\Models\City;
use App\Models\WeatherLog;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class CityWeatherService
{
    public function fetchAndSave(City $city): ?WeatherLog
    {
        $cacheKey = 'weather_' . strtolower($city->name);

        try {
            // 🧠 Cache API response for 5 minutes to limit API calls
            $response = Cache::remember($cacheKey, now()->addMinutes(5), function () use ($city, $apiKey) {
//                API Call;
            });

        } catch (\Throwable $e) {
            Log::error("Weather fetch failed for city {$city->name}: " . $e->getMessage());
            return null;
        }
    }
}
