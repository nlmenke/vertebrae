<?php
/**
 * Fixer API service.
 *
 * @author Nick Menke <git@nlmenke.net>
 */

declare(strict_types=1);

namespace App\Services\Api\ExchangeRates;

use App\Exceptions\Api\MissingOrInvalidApiKeyException;
use App\Interfaces\ExchangeRatesApiServiceInterface;
use App\Services\Api\AbstractApiService;
use Exception;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Throwable;

/**
 * Handles making requests to the Fixer API. Fixer is one of the services that
 * can be used to retrieve exchange rates for the currencies used by the
 * application. Fixer has a free tier which allows up to 100 requests per
 * month. To use Fixer, you will need to create an account and add the API key
 * to your .env file.
 *
 * @since 0.0.0-vertebrae introduced
 *
 * @link https://fixer.io/
 */
final class FixerApiService extends AbstractApiService implements ExchangeRatesApiServiceInterface
{
    /**
     * Creates a new API service instance.
     *
     * @throws Throwable
     */
    public function __construct()
    {
        $apiKey = Config::string('currency.exchange_rates.drivers.fixer');

        throw_unless($apiKey, MissingOrInvalidApiKeyException::class, 'Missing Fixer API key.');

        $this->baseUri = 'https://data.fixer.io/api/';

        parent::__construct();
    }

    /**
     * Get an array of all exchange rates from the API.
     *
     * @return array<string, float>
     */
    public function getExchangeRates(): array
    {
        try {
            /** @var array<string, array<string, float|int>|bool|int|string> $result */
            $result = $this->get('latest', null, [
                'access_key' => Config::string('currency.exchange_rates.drivers.fixer'),
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
