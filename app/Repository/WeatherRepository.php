<?php

declare(scrict_types=1);

namespace App\Repository;

use App\Services\WttrinService;
use Illuminate\Http\Request;


class WeatherRepository
{

    public function __construct(private WttrinService $wttrin)
    {
    }

    public function get($search): ?object
    {
        return $this->wttrin->get($search);
    }
}
