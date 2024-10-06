<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    
    public function index(Request $request)
    {
        $city = $request->input('city');
    
        // Validate city input
        // if (empty($city)) {
        //     return redirect()->back()->withErrors(['city' => 'City name is required.']);
        // }
    
        $apiKey = env('OPENWEATHER_API_KEY'); 
        $url = "https://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$apiKey}&units=metric";

        // try {
            $response = Http::get($url);
            if ($response->successful()) {
                $weatherData = $response->json();
                return to_route('index')->with('weatherData', $weatherData);
            } else {
                return redirect()->back()->withErrors(['api' => 'Could not retrieve weather data.']);
            }
        // } catch (\Exception $e) {
        //     return redirect()->back()->withErrors(['api' => 'An error occurred: ' . $e->getMessage()]);
        // }
    }
    
}
