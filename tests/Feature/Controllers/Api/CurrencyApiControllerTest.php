<?php declare(strict_types=1);
/**
 * Currency API Controller Test Case.
 *
 * @package   Tests\Feature\Controllers\Api
 * @author    Nick Menke <nick@nlmenke.net>
 * @copyright 2018-2019 Nick Menke
 * @link      https://github.com/nlmenke/vertebrae
 */

namespace Tests\Feature\Controllers\Api;

use App\Entities\Currency\Currency;

/**
 * The Currency API controller test class.
 *
 * This class is used to test currency API route functionality.
 *
 * Functional tests are written from a user's perspective. These tests confirm
 * that the system does what users are expecting it to.
 *
 * @since x.x.x introduced
 */
class CurrencyApiControllerTest extends AbstractApiControllerTest
{
    /**
     * The entity used by the tests.
     *
     * @var Currency
     */
    protected $model = Currency::class;

    /**
     * Required fields to be cleared for testing validation.
     *
     * @var array
     */
    protected $validationRequirements = [
        'iso_alpha',
        'iso_numeric',
        'name',
    ];
}
