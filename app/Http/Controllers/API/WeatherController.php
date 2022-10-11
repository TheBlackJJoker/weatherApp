<?php

namespace App\Http\Controllers\API;

use App\Interfaces\Weather;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class WeatherAPIController extends Controller
{

    public function __construct(private Weather $weather)
    {
    }

    public function get($city)
    {
        return new JsonResponse($this->weather->get($city));
    }
}
