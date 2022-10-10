<?php

declare(strict_types=1);

namespace App\Services;

use App\DTOs\WeatherData;
use App\Interfaces\Weather;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;


class WttrinService implements Weather
{

    public function __construct(private Client $client, private WeatherData $weatherData)
    {
    }

    public function get($search): ?object
    {
        try {
            $response = $this->client->request("GET", "https://wttr.in/" . $search . "?lang=pl&format=j1");
        } catch (ClientException $e) {
            return null;
        }

        return $this->weatherData::fromWttrin($response);
    }
}
