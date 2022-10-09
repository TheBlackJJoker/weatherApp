<?php

declare(scrict_types=1);

namespace App\Repository;

use App\Services\WttrinService;
use Illuminate\Http\Request;


class WeatherRepository
{

    public function __construct(private Request $request, private WttrinService $wttrin)
    {
        $this->city = $request->city;
    }

    public function get(): ?object
    {
        return $this->wttrin->get($this->city);
    }
}
