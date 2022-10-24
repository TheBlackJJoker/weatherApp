<?php

declare(strict_types=1);

namespace Tests\Feature\Httpd;

use Tests\TestCase;

class WeatherTest extends TestCase
{
    public function testShowWeatherSearch(): void
    {
        $response = $this->get("/");

        $response->assertStatus(200);
    }

    public function testShowWeatherForLegnica(): void
    {
        $response = $this->get("/?city=Legnica");

        $response->assertStatus(200);
    }
}
