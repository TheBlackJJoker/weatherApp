<?php

declare(strict_types=1);

namespace App\Http\Controllers;
use App\Repository\WeatherRepository;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    private WeatherRepository $weatherRepository;
    public function __construct(WeatherRepository $weatherRepository){
        $this->weatherRepository = $weatherRepository;
    }

    function searchView(): Object{
        return view('weather', ['content'=>$this->weatherRepository->get()]);
    }
}
