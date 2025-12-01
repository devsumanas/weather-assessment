<?php

use App\Models\WeatherLog;
use Illuminate\Support\Facades\Route;

Route::get('/weather', function () {
    return WeatherLog::with('city')
        ->latest('fetched_at')
        ->take(10)
        ->get();
});
