<?php

namespace App\Services;

use App\Models\City;
use App\Models\WeatherLog;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use App\Events\WeatherUpdated;


class CityWeatherService
{
    public function fetchAndSave(City $city): ?WeatherLog
    {
        $cacheKey = 'weather_' . strtolower($city->name);

        try {
            $apiKey = config('services.openweather.key');
            // 🧠 Cache API response for 5 minutes to limit API calls
            $response = Cache::remember($cacheKey, now()->addMinutes(5), function () use ($city, $apiKey) {
                
                
                $url = "https://api.openweathermap.org/data/2.5/weather?q={$city->name}&appid={$apiKey}&units=metric";
                $respose = Http::get($url);

                if($respose->failed()){
                    throw new \Exception("Weather api failed");
                }

                $data = $respose->json();
                
                $data_array  = [
                        'city_id' => $city->id,
                        'temperature' => $data['main']['temp'] ?? null,
                        'humidity' => $data['main']['humidity'] ?? null,
                        'windSpeed' => $data['main']['speed'] ?? null,
                        'description' => $data['weather'][0]['description'] ?? null,
                    ];
                $weatherLog =  WeatherLog::create($data_array);

                $oldTemp  = $city->temperature;
                $updatedTemp  = $data['main']['temp'];

                \Log::info(json_decode($city));
                $temp_diff  = abs($updatedTemp - $oldTemp);
                \Log::info($updatedTemp);
                \Log::info($oldTemp);
                \Log::info($temp_diff);
                if($oldTemp !== null && abs($updatedTemp - $oldTemp) >= 3){
                    \Log::info("after call");
                    event(new WeatherUpdated($city, $oldTemp, $updatedTemp));
                }
                
                return $weatherLog;
            });

            return $response;

        } catch (\Throwable $e) {
            Log::error("Weather fetch failed for city {$city->name}: " . $e->getMessage());
            return null;
        }
    }
}
