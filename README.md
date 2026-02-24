## Laravel Weather App Assessment 

### Task 1: Display latest weather data in the view

Show the latest weather data for all cities in index route "/"


### Task 2: Integrate Weather API with Error Handling

- Call OpenWeatherMap API on `app/Services/CityWeatherService.php`
- A valid API key is available in the .env file.You must add it to the Laravel config

Example endpoint:
```
https://api.openweathermap.org/data/2.5/weather?q={CITY}&appid={API_KEY}&units=metric
```

- Parse the API response and save a record into the WeatherLog model
```
API Field	    Model Field
main.temp	    temperature
main.humidity	    humidity
wind.speed	    windSpeed
weather[0].description description
```

### Task 3: Event Listener

If the previous weather log temperature is greater than 3°C, trigger an Event Listener
- Listener should write the entry into a custom log file
