<?php
/**
 * Open Exchange Rates API service.
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
 * Handles making requests to the Open Exchange Rates (OXR) API. OXR is one of
 * the services that can be used to retrieve exchange rates for the currencies
 * used by the application. OXR has a free tier which allows up to 1000
 * requests per month. This free plan is limited to USD as the base currency;
 * if you require another as the base, you will need to upgrade to a paid plan.
 * To use OXR, you will need to create an account and add the API key (App ID)
 * to your .env file.
 *
 * @since 0.0.0-vertebrae introduced
 *
 * @link https://openexchangerates.org/
 */
final class OpenExchangeRatesApiService extends AbstractApiService implements ExchangeRatesApiServiceInterface
{
    /**
     * Creates a new API service instance.
     *
     * @throws Throwable
     */
    public function __construct(?Client $client = null)
    {
        $apiKey = Config::string('currency.exchange_rates.drivers.open_exchange_rates');

        throw_unless(
            $apiKey,
            MissingOrInvalidApiKeyException::class,
            trans('exceptions.api.missing_api_key', [
                'name' => 'Open Exchange Rates',
            ])
        );

        $this->baseUri = 'https://openexchangerates.org/api/';

        $this->headers([
            'Authorization' => 'Token ' . $apiKey,
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
            $result = $this->get('latest.json', null, [
                'base' => Config::string('currency.default'),
            ]);

            /** @var array<string, float|int> $result */
            $result = $result['rates'];

            // force float values since some may be returned as integers
            return array_map(fn (float|int $rate): float => (float) $rate, $result);
        } catch (Exception $exception) {
            Log::error($exception->getMessage());

            return [];
        }
    }
}
