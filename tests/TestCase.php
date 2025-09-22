<?php

/**
 * Abstract Test Case.
 *
 * @package Tests
 *
 * @author    Taylor Otwell <taylor@laravel.com>
 * @author    Nick Menke <nick@nlmenke.com>
 * @copyright 2018-2020 Nick Menke
 *
 * @link https://github.com/nlmenke/vertebrae
 */

declare(strict_types=1);

namespace Tests;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

/**
 * The base test case class.
 *
 * This class contains any functions that would otherwise be duplicated in
 * other test cases. All other test cases should extend this class.
 *
 * @since 0.0.0-framework introduced
 * @since x.x.x           added DatabaseMigrations trait to allow DB testing
 */
abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use DatabaseMigrations;
}
