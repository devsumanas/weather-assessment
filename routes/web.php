<?php

use App\Http\Controllers\WeatherController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => redirect()->route('weather.index'));

Route::prefix('weather')->group(function () {
    Route::get('/', [WeatherController::class, 'index'])->name('weather.index');
    Route::post('/fetch', [WeatherController::class, 'fetch'])->name('weather.fetch');
});
