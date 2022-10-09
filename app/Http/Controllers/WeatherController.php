<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Repository\WeatherRepository;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WeatherController extends Controller
{
    public function __construct(private WeatherRepository $weatherRepository)
    {
    }

    public function searchView(Request $request): View
    {
        return view('weather', ['content' => $this->weatherRepository->get($request->city)]);
    }
}
