<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\WeatherSearchRequest;
use App\Interfaces\Weather;
use Exception;
use Illuminate\View\View;

class WeatherController extends Controller
{
    public function __invoke(WeatherSearchRequest $request, Weather $weather): View
    {
        $error = false;
        $content = null;

        try {
            $content = $weather->get($request->city);
        } catch (Exception $e) {
            $error = $e->getMessage();
        }

        return view("weather", [
            "content" => $content,
            "input" => $request->city,
            "error" => $error,
        ]);
    }
}
