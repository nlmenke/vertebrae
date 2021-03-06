<?php
/**
 * Console Routes.
 *
 * This file is where you may define all of your Closure-based console
 * commands. Each Closure is bound to a command instance allowing a
 * simple approach to interacting with each command's IO methods.
 *
 * @package Routes
 *
 * @author    Taylor Otwell <taylor@laravel.com>
 * @copyright 2018-2020 Nick Menke
 *
 * @link  https://github.com/nlmenke/vertebrae
 * @since 0.0.0-framework introduced
 */

declare(strict_types=1);

use Illuminate\Foundation\Inspiring;

Artisan::command('inspire', function (): void {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');
