<?php

/**
 * Bootstrap The Test Environment.
 *
 * You may specify console commands that execute once before your test is
 * run. You are free to add your own additional commands or logic into
 * this file as needed in order to help your test suite run quicker.
 *
 * @package Tests
 *
 * @author    Taylor Otwell <taylor@laravel.com>
 * @copyright 2018-2020 Nick Menke
 *
 * @link  https://github.com/nlmenke/vertebrae
 * @since 0.0.0-framework introduced
 */

declare(strict_types=1);

use Illuminate\Contracts\Console\Kernel;

require_once __DIR__ . '/../vendor/autoload.php';

$commands = [
    'config:cache',
    'event:cache',
];

$app = require __DIR__ . '/../bootstrap/app.php';

$console = tap($app->make(Kernel::class))->bootstrap();

foreach ($commands as $command) {
    $console->call($command);
}
