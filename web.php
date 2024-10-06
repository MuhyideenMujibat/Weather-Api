<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherController;

Route::get('/', function () {
    return view('index');
})->name('index');


Route::get('/weather', [WeatherController::class, 'index'])->name('weather');
