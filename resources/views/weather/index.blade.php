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
            <tr>
                <td>Chennai</td>
                <td>24</td>
                <td>70%</td>
                <td>20</td>
                <td>Cold</td>
                <td>3 Mins Ago</td>
            </tr>
            <tr>
                <td>London</td>
                <td>12</td>
                <td>80%</td>
                <td>10</td>
                <td>Cold</td>
                <td>5 Mins Ago</td>
            </tr>
        </tbody>
    </table>
</div>

</body>
</html>
