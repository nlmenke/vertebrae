<?php
/**
 * CurrencyApi API service.
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
 * Handles making requests to the CurrencyApi API. CurrencyApi is one of the
 * services that can be used to retrieve exchange rates for the currencies used
 * by the application. CurrencyApi has a free tier which allows up to 300
 * requests per month. To use CurrencyApi, you will need to create an account
 * and add the API key to your .env file.
 *
 * @since 0.0.0-vertebrae introduced
 *
 * @link https://currencyapi.com/
 */
final class CurrencyApiApiService extends AbstractApiService implements ExchangeRatesApiServiceInterface
{
    /**
     * Creates a new API service instance.
     *
     * @throws Throwable
     */
    public function __construct(?Client $client = null)
    {
        $apiKey = Config::string('currency.exchange_rates.drivers.currency_api');

        throw_unless(
            $apiKey,
            MissingOrInvalidApiKeyException::class,
            trans('exceptions.api.missing_api_key', [
                'name' => 'CurrencyApi',
            ])
        );

        $this->baseUri = 'https://api.currencyapi.com/v3/';

        $this->headers([
            'apikey' => $apiKey,
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
            /** @var array<array<string, array<string, float|int|string>|string>> $result */
            $result = $this->get('latest', null, [
                'base_currency' => Config::string('currency.default'),
            ]);

            /** @var array<string, array<string, float|int|string>> $result */
            $result = $result['data'];

            // force float values since some may be returned as integers
            return array_map(fn (array $rate): float => (float) $rate['value'], $result);
        } catch (Exception $exception) {
            Log::error($exception->getMessage());

            return [];
        }
    }
}
