<?php

declare(strict_types=1);

namespace App\DTOs;

use GuzzleHttp\Psr7\Response;

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

    public static function fromWttrin(Response $response): self
    {
        $data = json_decode($response->getBody()->getContents(), false);

        return new self(
            intval($data->current_condition[0]->temp_C),
            $data->current_condition[0]->lang_pl[0]->value,
            $data->nearest_area[0]->areaName[0]->value,
            $data->nearest_area[0]->country[0]->value,
            floatval($data->nearest_area[0]->latitude),
            floatval($data->nearest_area[0]->longitude),
        );
    }
}
