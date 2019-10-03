<?php declare(strict_types=1);

namespace Tests\Feature\Controllers\Api;

use App\Entities\Country\Country;

/**
 * Class CountryApiTest
 *
 * @package Tests\Feature\Controllers\Api
 * @author  Nick Menke <nick@nlmenke.net>
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
