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

    public function __construct(private InterfacesWeather $weather)
    {
        parent::__construct();
    }

    public function handle()
    {
        if ($this->argument('city'))
            $now = $this->weather->get($this->argument('city'));
        else {
            $answer = $this->ask("Dla jakiej miejscowości chcesz sprawdzić pogodę?");
            $now = $this->weather->get($answer);
        }

        $this->info($now->tempC . '°C | ' . $now->description . ' - ' . $now->location . ', ' . $now->country);
    }
}
