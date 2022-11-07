<?php

declare(strict_types=1);

namespace App\DTOs;

final class WeatherData
{
    public function __construct(
        public readonly int $tempC,
        public readonly string $description,
        public readonly string $location,
        public readonly string $country,
        public readonly float $latitude,
        public readonly float $longitude,
    ) {}
}
