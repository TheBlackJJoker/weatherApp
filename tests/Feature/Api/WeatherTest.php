<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WeatherTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testWeatherForLegnica()
    {
        $response = $this->get('/api/weather/get/Legnica');

        $response->assertStatus(200)
            ->assertJson([
                "data" =>  [
                    "location" => "Legnica",
                    "country" => "Poland",
                    "latitude" => 51.2,
                    "longitude" => 16.2
                ]
            ]);
    }
}
