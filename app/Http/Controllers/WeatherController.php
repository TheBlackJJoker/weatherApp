<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WeatherController extends Controller
{
    function searchView(): Object{
        return view('weather');
    }
}
