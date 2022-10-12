<?php

namespace App\Http\Controllers\API;

use App\Interfaces\Weather;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class WeatherController extends Controller
{
    public function __invoke(string $city, Weather $weather): JsonResponse
    {
        $weatherData = $weather->get($city);
        return new JsonResponse(["data" => $weatherData]);
    }
}
