<?php
/**
 * Country API Controller Test Case.
 *
 * @package Tests\Feature\Controllers\Api
 *
 * @author    Nick Menke <nick@nlmenke.net>
 * @copyright 2018-2019 Nick Menke
 *
 * @link https://github.com/nlmenke/vertebrae
 */

declare(strict_types=1);

namespace Tests\Feature\Controllers\Api;

use App\Entities\Country\Country;
use App\Http\Controllers\Api\CountryApiController;

/**
 * The Country API controller test class.
 *
 * This class is used to test country API route functionality.
 *
 * Functional tests are written from a user's perspective. These tests confirm
 * that the system does what users are expecting it to.
 *
 * @covers CountryApiController
 *
 * @internal
 * @small
 *
 * @since x.x.x introduced
 */
class CountryApiControllerTest extends AbstractApiControllerTest
{
    /**
     * The entity used by the tests.
     *
     * @var Country
     */
    protected $model = Country::class;

    /**
     * Required fields to be cleared for testing validation.
     *
     * @var array
     */
    protected $validationRequirements = [
        'iso_alpha_2',
        'iso_alpha_3',
        'iso_numeric',
        'name',
    ];
}
