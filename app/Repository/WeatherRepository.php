<?php

declare(scrict_types=1);

namespace App\Repository;

use App\Services\WttrinService;
use Illuminate\Http\Request;


class WeatherRepository
{

    private Request $request;
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function get(): ?object
    {
        if ($this->request->city) {
            $wttrin = new WttrinService($this->request->city);
            return $wttrin->get($this->request->city);
        } else {
            return null;
        }
    }
}
