<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeatherLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'city_id',
        'temperature',
        'humidity',
        'wind_speed',
        'description',
        'fetched_at'
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
