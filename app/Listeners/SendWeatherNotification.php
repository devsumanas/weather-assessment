<?php

namespace App\Listeners;

use App\Events\WeatherUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class SendWeatherNotification implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle(WeatherUpdated $event): void
    {
        // TODO: Log a message
        // Example: [WeatherAlert] City: Chennai | Old: 30°C | New: 34°C

        $city = $event->city->name;
        $old  = number_format($event->oldTemp, 1);
        $new  = number_format($event->newTemp, 1);
        $change = $new > $old ? '📈 Temperature Rise' : '📉 Temperature Drop';

        $message = "[WeatherAlert] {$change} detected in {$city} | Old: {$old}°C | New: {$new}°C";
        \Log::info("Called");
        // Log to laravel.log
        Log::channel('weather')->info("Tempearatue changed for {$city}. Old: {old} New: {new}");
        // Log::info($message);

    }
}
