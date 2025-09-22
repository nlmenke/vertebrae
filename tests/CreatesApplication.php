<?php

/**
 * Create Application Trait.
 *
 * @package Tests
 *
 * @author    Taylor Otwell <taylor@laravel.com>
 * @copyright 2018-2020 Nick Menke
 *
 * @link https://github.com/nlmenke/vertebrae
 */

declare(strict_types=1);

namespace Tests;

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Foundation\Application;

/**
 * The Creates Application Trait.
 *
 * This trait loads the test bootstrapper. It is loaded in the `Tests\TestCase`
 * abstract class, so all test cases are bootstrapped when it's extended.
 *
 * @since 0.0.0-framework introduced
 */
trait CreatesApplication
{
    /**
     * Creates the application.
     *
     * @return Application
     */
    public function createApplication(): Application
    {
        $app = require __DIR__ . '/../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();

        return $app;
    }
}
