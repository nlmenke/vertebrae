<?php
/**
 * ExchangeRate-API API service.
 *
 * @author Nick Menke <git@nlmenke.net>
 */

declare(strict_types=1);

namespace App\Services\Api\ExchangeRates;

use App\Exceptions\Api\MissingOrInvalidApiKeyException;
use App\Interfaces\ExchangeRatesApiServiceInterface;
use App\Services\Api\AbstractApiService;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Throwable;

/**
 * Handles making requests to the ExchangeRate-API API. ExchangeRate-API is one
 * of the services that can be used to retrieve exchange rates for the
 * currencies used by the application. ExchangeRate-API has a free tier which
 * allows up to 1500 requests per month. To use ExchangeRate-API, you will need
 * to create an account and add the API key to your .env file.
 *
 * @since 0.0.0-vertebrae introduced
 *
 * @link https://exchangerate-api.com/
 */
final class ExchangeRateApiApiService extends AbstractApiService implements ExchangeRatesApiServiceInterface
{
    /**
     * Creates a new API service instance.
     *
     * @throws Throwable
     */
    public function __construct(?Client $client = null)
    {
        $apiKey = Config::string('currency.exchange_rates.drivers.exchangerate_api');

        throw_unless($apiKey, MissingOrInvalidApiKeyException::class, 'Missing ExchangeRate-API API key.');

        $this->baseUri = 'https://v6.exchangerate-api.com/v6/';

        $this->headers([
            'Authorization' => 'Bearer ' . $apiKey,
        ]);

        parent::__construct($client);
    }

    /**
     * Get an array of all exchange rates from the API.
     *
     * @return array<string, float>
     */
    public function getExchangeRates(): array
    {
        try {
            /** @var array<string, array<string, float|int>|int|string> $result */
            $result = $this->get('latest/' . Config::string('currency.default'));

            /** @var array<string, float|int> $result */
            $result = $result['conversion_rates'];

            // force float values since some may be returned as integers
            return array_map(fn (float|int $rate): float => (float) $rate, $result);
        } catch (Exception $exception) {
            Log::error($exception->getMessage());

            return [];
        }
    }
}
