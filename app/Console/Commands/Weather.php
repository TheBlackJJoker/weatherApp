<?php

namespace App\Console\Commands;

use App\Interfaces\Weather as InterfacesWeather;
use Illuminate\Console\Command;

class Weather extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weather:get {city?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sprawdź pogodę weather:get {miasto} ';

    /**
     * Execute the console command.
     *
     * @return int
     */

    public function handle(InterfacesWeather $weather)
    {
        if ($this->argument('city'))
            $now = $weather->get($this->argument('city'));
        else {
            $answer = $this->ask("Dla jakiej miejscowości chcesz sprawdzić pogodę?");
            $now = $weather->get($answer);
        }

        $this->info($now->tempC . '°C | ' . $now->description . ' - ' . $now->location . ', ' . $now->country);
    }
}
