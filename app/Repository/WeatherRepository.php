<?php

declare(scrict_types=1);

namespace App\Repository;

use App\Services\WttrinService;
use Illuminate\Http\Request;


class WeatherRepository
{

    private Request $request;
    private WttrinService $wttrin;
    public function __construct(Request $request, WttrinService $wttrin)
    {
        $this->request = $request;
        $this->wttrin = $wttrin;
    }

    public function get(): ?object
    {
        if ($this->request->city) {
            return $this->wttrin->get($this->request->city);
        } else {
            return null;
        }
    }
}
