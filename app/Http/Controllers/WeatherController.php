<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\WeatherSearchRequest;
use App\Repository\WeatherRepository;
use App\Services\WttrinService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WeatherController extends Controller
{
    public function __construct(private WttrinService $wttrin)
    {
    }

    public function searchView(WeatherSearchRequest $request): View
    {
        return view('weather', ['content' => $this->wttrin->get($request->city)]);
    }
}
