<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\WeatherLog;
use App\Jobs\FetchWeatherData;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    /**
     * Display the weather dashboard.
     */
    public function index()
    {
        // Task 1: Fetch all cities with their latest weather log
        return view('weather.index');
    }

    /**
     * Manually trigger weather data fetch.
     */
    public function fetch(Request $request)
    {
        FetchWeatherData::dispatchSync();
        return redirect()->route('weather.index')
            ->with('status', 'Weather fetch job dispatched successfully!');
    }
}
