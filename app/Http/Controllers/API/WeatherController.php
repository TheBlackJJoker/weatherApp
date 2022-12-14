<?php

declare(strict_types=1);

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Interfaces\Weather;
use Exception;
use Illuminate\Http\JsonResponse;

class WeatherController extends Controller
{
    public function __invoke(string $city, Weather $weather): JsonResponse
    {
        try {
            $weatherData = $weather->get($city);
            return new JsonResponse(["data" => $weatherData]);
        } catch (Exception $e) {
            return new JsonResponse(["error" => $e->getMessage()]);
        }
    }
}
