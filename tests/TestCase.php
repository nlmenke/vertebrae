<?php declare(strict_types=1);

namespace Tests;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

/**
 * Class TestCase
 *
 * @package Tests
 * @author  Nick Menke <nick@nlmenke.net>
 */
abstract class TestCase extends BaseTestCase
{
    use CreatesApplication,
        DatabaseMigrations;
}
