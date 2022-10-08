<?php

declare(strict_types=1);

namespace App\Services;

use GuzzleHttp\Client;


class WttrinService
{
    public function get($search): object
    {
        $client = new Client();
        $response = $client->request("GET", "https://wttr.in/" . $search . "?lang=pl&format=j1");
        return json_decode($response->getBody()->getContents(), false);
    }
}
