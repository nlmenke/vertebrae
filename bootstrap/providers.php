<?php
/**
 * Providers bootstrapper.
 *
 * @author Taylor Otwell <taylor@laravel.com>
 *
 * @since 0.0.0-framework introduced
 */

declare(strict_types=1);

use App\Providers\AppServiceProvider;
use App\Providers\FortifyServiceProvider;

return [
    AppServiceProvider::class,
    FortifyServiceProvider::class,
];
