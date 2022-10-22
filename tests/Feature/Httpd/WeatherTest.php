<?php

namespace Tests\Feature\Httpd;

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
    public function testShowWeatherSearch()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testShowWeatherForLegnica()
    {
        $response = $this->get('/?city=Lengnica');

        $response->assertStatus(200);
    }
}
