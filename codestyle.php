<?php

declare(strict_types=1);

use Blumilk\Codestyle\Config;
use Blumilk\Codestyle\Configuration\Defaults\LaravelPaths;

$paths = new LaravelPaths();

$config = new Config(
    paths: new LaravelPaths(LaravelPaths::LARAVEL_9_PATHS),
);

return $config->config();
