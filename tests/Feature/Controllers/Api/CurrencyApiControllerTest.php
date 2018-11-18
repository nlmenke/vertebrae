<?php namespace Tests\Feature\Controllers\Api;

use App\Entities\Currency\Currency;

/**
 * Class CurrencyApiTest
 *
 * @package Tests\Feature\Controllers\Api
 * @author  Nick Menke <nick@nlmenke.net>
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
        'symbol',
        'decimal_precision',
        'exchange_rate',
    ];
}
