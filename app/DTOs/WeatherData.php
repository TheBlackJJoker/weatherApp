<?php

declare(strict_types=1);

namespace App\DTOs;

readonly class WeatherData
{
    public function __construct(
        public int $tempC,
        public string $description,
        public string $location,
        public string $country,
        public float $latitude,
        public float $longitude,
    ) {}
}
