<?php

declare(strict_types=1);

namespace App\Services;

use App\DTOs\WeatherData;
use App\Interfaces\Weather;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7\Response;

class WttrinService implements Weather
{
    public function __construct(
        private Client $client,
    ) {}

    public function get(?string $search = null): ?WeatherData
    {
        if (!$search) {
            return null;
        }

        try {
            $response = $this->client->request("GET", "https://wttr.in/" . $search . "?lang=pl&format=j1");
        } catch (ClientException $e) {
            return throw new Exception("Nie znaleziono stacji meteorologicznej!");
        }

        return $this->dto($response);
    }

    private function dto(Response $response)
    {
        $data = json_decode($response->getBody()->getContents(), false);

        return new WeatherData(
            intval($data->current_condition[0]->temp_C),
            $data->current_condition[0]->lang_pl[0]->value,
            $data->nearest_area[0]->areaName[0]->value,
            $data->nearest_area[0]->country[0]->value,
            floatval($data->nearest_area[0]->latitude),
            floatval($data->nearest_area[0]->longitude),
        );
    }
}
