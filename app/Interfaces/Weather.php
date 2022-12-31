<?php

declare(strict_types=1);

namespace App\Interfaces;

use App\DTOs\WeatherData;

interface Weather
{
    public function get(string $search): ?WeatherData;
}
