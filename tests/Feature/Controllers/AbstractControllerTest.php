<?php

/**
 * Abstract Controller Test Case.
 *
 * @package Feature Tests
 *
 * @author    Nick Menke <nick@nlmenke.net>
 * @copyright 2018-2020 Nick Menke
 *
 * @link https://github.com/nlmenke/vertebrae
 */

declare(strict_types=1);

namespace Feature\Controllers;

use Tests\TestCase;

/**
 * The base controller test class.
 *
 * This class contains any functionality that would otherwise be duplicated in
 * other controller tests. All other controller tests should extend this class.
 *
 * Functional tests are written from a user's perspective. These tests confirm
 * that the system does what users are expecting it to.
 *
 * @since x.x.x introduced
 */
abstract class AbstractControllerTest extends TestCase
{
}
