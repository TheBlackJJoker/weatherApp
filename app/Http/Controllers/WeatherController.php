<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\WeatherSearchRequest;
use Illuminate\View\View;
use App\Interfaces\Weather;
use Exception;

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

        return view('weather', [
            'content' => $content,
            'input' => $request->city,
            'error' => $error
        ]);
    }
}
