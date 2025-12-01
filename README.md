## Laravel Weather App Assessment 

### Task 1: Integrate Weather API with Error Handling

- Call OpenWeatherMap API on `app/Services/CityWeatherService.php`

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

### Task 2: API Key Security Issue
A valid API key is available in the .env file.
You must add it to the Laravel config for secure & consistent access.

### Task 3: Event Listener

If the previous weather log temperature is greater than 3°C, trigger an Event Listener
- Listener should write the entry into a custom log file

### Task 4: City Management
- Complete the partially implemented CityController
- Add **Create & Delete** method
- Add unique validation for city names
- Implement soft deletes for cities
