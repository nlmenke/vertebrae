<?php declare(strict_types=1);

namespace App\Services\Api\Currency;

use App\Services\Api\AbstractApiService;
use Exception;

/**
 * Class OpenExchangeRatesApiService
 *
 * @package App\Services\Api\Currency
 * @author  Nick Menke <nick@nlmenke.net>
 */
class OpenExchangeRatesApiService extends AbstractApiService
{
    /**
     * Create a new API service instance.
     *
     * @return void
     * @throws Exception
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
