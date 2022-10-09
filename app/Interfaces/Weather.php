<?php

declare(strict_types=1);

namespace App\Interfaces;

interface Weather
{
    public function get(string $search);
}
