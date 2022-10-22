<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Interfaces\Weather as InterfacesWeather;
use Exception;
use Illuminate\Console\Command;

class Weather extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = "weather:get {city?}";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Sprawdź pogodę weather:get {miasto} ";

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(InterfacesWeather $weather)
    {
        if ($this->argument("city")) {
            $city = $this->argument("city");
        } else {
            $city = $this->ask("Dla jakiej miejscowości chcesz sprawdzić pogodę?");
        }

        try {
            $now = $weather->get($city);
            $this->info($now->tempC . "°C | " . $now->description . " - " . $now->location . ", " . $now->country);
        } catch (Exception $e) {
            $this->error($e->getMessage());
        }
    }
}
