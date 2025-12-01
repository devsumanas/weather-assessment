<?php

namespace App\Events;

use App\Models\City;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class WeatherUpdated
{
    use Dispatchable, SerializesModels;

    public function __construct(
        public City $city,
        public float $oldTemp,
        public float $newTemp
    ) {}
}
