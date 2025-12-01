<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\FetchWeatherData;

class FetchWeatherCommand extends Command
{
    protected $signature = 'weather:fetch';
    protected $description = 'Fetch latest weather data for all cities';

    public function handle(): void
    {
        FetchWeatherData::dispatch();
        $this->info('Weather fetch job dispatched successfully.');
    }
}
