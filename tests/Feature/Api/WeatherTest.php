<?php

declare(strict_types=1);

namespace Tests\Feature\Api;

use Tests\TestCase;

class WeatherTest extends TestCase
{
    public function testWeatherForLegnica(): void
    {
        $response = $this->get("/api/weather/get/Legnica");

        $response->assertStatus(200)
            ->assertJson([
                "data" => [
                    "country" => "Poland",
                    "latitude" => 51.2,
                    "longitude" => 16.2,
                ],
            ]);
    }
}
