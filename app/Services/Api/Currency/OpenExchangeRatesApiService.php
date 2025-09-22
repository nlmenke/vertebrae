<?php

/**
 * Open Exchange Rates API Service.
 *
 * @package App\Services\Api\Currency
 *
 * @author    Nick Menke <nick@nlmenke.net>
 * @copyright 2018-2020 Nick Menke
 *
 * @link https://github.com/nlmenke/vertebrae
 */

declare(strict_types=1);

namespace App\Services\Api\Currency;

use App\Services\Api\AbstractApiService;
use Exception;

/**
 * The Open Exchange Rates API service class.
 *
 * This class handles making requests to the Open Exchange Rates API. OXR is
 * used to retrieve exchange rates for the currencies used by the application.
 *
 * @since x.x.x introduced
 */
class OpenExchangeRatesApiService extends AbstractApiService
{
    /**
     * Create a new API service instance.
     *
     * @throws Exception
     *
     * @return void
     */
    public function __construct()
    {
        if (!config('currency.api_key')) {
            throw new Exception('Missing config value for "currency.api_key"');
        }

        $this->baseUri = 'https://openexchangerates.org/api/';

        $this->headers([
            'Authorization' => 'Token ' . config('currency.api_key'),
        ]);

        parent::__construct();
    }
}
