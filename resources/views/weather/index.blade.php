<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Aggregator Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">🌤️ Weather Aggregator</h2>
        <form method="POST" action="{{ route('weather.fetch') }}">
            @csrf
            <button type="submit" class="btn btn-primary">
                Fetch Latest Weather
            </button>
        </form>
    </div>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <table class="table table-bordered bg-white shadow-sm">
        <thead class="table-light">
        <tr>
            <th>City</th>
            <th>Temperature (°C)</th>
            <th>Humidity (%)</th>
            <th>Wind Speed (m/s)</th>
            <th>Description</th>
            <th>Last Fetched</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($cities as $city)
            @php
                $log = $city->weatherLogs->first();
            @endphp
            <tr>
                <td>{{ $city->name }}</td>
                <td>{{ $log?->temperature ?? '-' }}</td>
                <td>{{ $log?->humidity ?? '-' }}</td>
                <td>{{ $log?->wind_speed ?? '-' }}</td>
                <td>{{ ucfirst($log?->description ?? '-') }}</td>
                <td>{{ $log?->fetched_at ? \Carbon\Carbon::parse($log->fetched_at)->diffForHumans() : '-' }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center text-muted">No weather data available yet.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>

</body>
</html>
