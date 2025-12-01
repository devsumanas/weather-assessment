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
        // Fetch all cities with their latest weather log
        $cities = City::with(['weatherLogs' => function ($q) {
            $q->latest('fetched_at')->limit(1);
        }])->get();

        return view('weather.index', compact('cities'));
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
