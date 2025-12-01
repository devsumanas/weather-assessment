<?php

namespace App\Jobs;

use App\Models\City;
use App\Services\CityWeatherService;
use App\Events\WeatherUpdated;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class FetchWeatherData implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle(CityWeatherService $weatherService): void
    {
        $cities = City::all();
        $successCount = 0;

        foreach ($cities as $city) {
            // TODO: Fetch data from API via service
            // TODO: Save to DB
            // TODO: Compare temperature change, trigger WeatherUpdated event
            try {
                $result = $weatherService->fetchAndSave($city);

                if ($result) {
                    $successCount++;
                    Log::info("✅ Weather updated for {$city->name}: {$result->temperature}°C");
                } else {
                    Log::warning("⚠️ Skipped city: {$city->name}, invalid data.");
                }
            } catch (\Throwable $e) {
                Log::error("❌ Failed to process city {$city->name}: " . $e->getMessage());
            }
        }
    }
}
