<?php

declare(strict_types=1);

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;


class WttrinService
{

    public function __construct(private Client $client)
    {
    }

    public function get($search): ?object
    {
        try {
            $response = $this->client->request("GET", "https://wttr.in/" . $search . "?lang=pl&format=j1");
        } catch (ClientException $e) {
            return null;
        }

        dd(json_decode($response->getBody()->getContents(), false));
        return json_decode($response->getBody()->getContents(), false);
    }
}
