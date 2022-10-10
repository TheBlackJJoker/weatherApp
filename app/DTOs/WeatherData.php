<?php

declare(strict_types=1);

namespace App\DTOs;

use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Collection;

final class WeatherData
{
    public function __construct(
        public readonly int $tempC = 0,
        public readonly string $description = ''
    ) {
    }

    public static function fromWttrin(Response $response): self
    {
        $data = json_decode($response->getBody()->getContents(), false);

        return new self(intval($data->current_condition[0]->temp_C), $data->current_condition[0]->lang_pl[0]->value);
    }
}
