<?php

declare(strict_types=1);

namespace App\DTOs;

use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Collection;

final class WeatherData
{

    public function __construct(
        public readonly Collection $now,
        public readonly Collection $station,
        public readonly Collection $weather,
    ) {
    }

    public static function fromWttrin(Response $response): self
    {
        $data = json_decode($response->getBody()->getContents(), false);
        // dd($data);

        $now = collect([
            'temp' => $data->current_condition[0]->temp_C,
            'feelsTemp' => $data->current_condition[0]->FeelsLikeC,
            'description' => $data->current_condition[0]->lang_pl[0]->value,
            'cloudcover' => $data->current_condition[0]->cloudcover,
            'humidity' => $data->current_condition[0]->humidity,
            'pressure' => $data->current_condition[0]->pressure,
            'uvIndex' => $data->current_condition[0]->uvIndex,
            'visibility' => $data->current_condition[0]->visibility,
            'winddir16Point' => $data->current_condition[0]->winddir16Point,
            'windspeedKmph' => $data->current_condition[0]->windspeedKmph,
        ]);

        $station = collect([
            'area' => $data->nearest_area[0]->areaName[0]->value,
            'country' => $data->nearest_area[0]->country[0]->value,
            'latitude' => $data->nearest_area[0]->latitude,
            'longitude' => $data->nearest_area[0]->longitude,
        ]);

        $weather = collect([]);

        // foreach ($data->weather as $nextDay) {
        //     $weather = collect([
        //         'avgtempC' => $nextDay->avgtempC
        //     ]);
        // }

        return new self($now, $station, $weather);
    }
}
