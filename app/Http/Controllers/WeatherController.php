<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\WeatherSearchRequest;
use Illuminate\View\View;
use App\Interfaces\Weather;


class WeatherController extends Controller
{
    public function __invoke(WeatherSearchRequest $request, Weather $weather): View
    {
        $content = $weather->get($request->city);

        return view('weather', [
            'content' => $content,
            'input' => $request->city
        ]);
    }
}
