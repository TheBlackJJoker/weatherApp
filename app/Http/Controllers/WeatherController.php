<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\WeatherSearchRequest;
use Illuminate\View\View;
use App\Interfaces\Weather;


class WeatherController extends Controller
{
    public function __construct(private Weather $weather)
    {
    }

    public function searchView(WeatherSearchRequest $request): View
    {
        return view('weather', ['content' => $this->weather->get($request->city)]);
    }
}
