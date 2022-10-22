<?php

declare(strict_types=1);

namespace App\Services;

use App\DTOs\WeatherData;
use App\Interfaces\Weather;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

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

        return WeatherData::fromWttrin($response);
    }
}
