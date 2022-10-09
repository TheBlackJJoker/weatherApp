<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Repository\WeatherRepository;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    public function __construct(private WeatherRepository $weatherRepository)
    {
    }

    function searchView(): Object
    {
        return view('weather', ['content' => $this->weatherRepository->get()]);
    }
}
