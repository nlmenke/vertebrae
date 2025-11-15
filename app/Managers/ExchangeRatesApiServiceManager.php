<?php
/**
 * Exchange Rates API Service manager.
 *
 * @author Nick Menke <git@nlmenke.net>
 */

declare(strict_types=1);

namespace App\Managers;

use App\Services\Api\ExchangeRates\CurrencyApiApiService;
use App\Services\Api\ExchangeRates\ExchangeRateApiApiService;
use App\Services\Api\ExchangeRates\FixerApiService;
use App\Services\Api\ExchangeRates\OpenExchangeRatesApiService;
use Illuminate\Support\Manager;

/**
 * Determines which exchange rate API to use.
 *
 * @since 0.0.0-vertebrae introduced
 *
 * @method array<string, float> getExchangeRates()
 */
final class ExchangeRatesApiServiceManager extends Manager
{
    /**
     * Create a new `CurrencyApi` API instance.
     *
     * @see https://currencyapi.com/
     */
    public function createCurrencyApiDriver(): CurrencyApiApiService
    {
        return new CurrencyApiApiService();
    }

    /**
     * Create a new `ExchangeRate-API` API instance.
     *
     * @see https://exchangerate-api.com/
     */
    public function createExchangeRateApiDriver(): ExchangeRateApiApiService
    {
        return new ExchangeRateApiApiService();
    }

    /**
     * Create a new `Fixer` instance.
     *
     * @see https://fixer.io/
     */
    public function createFixerDriver(): FixerApiService
    {
        return new FixerApiService();
    }

    /**
     * Create a new `Open Exchange Rates` instance.
     *
     * @see https://openexchangerates.org/
     */
    public function createOpenExchangeRatesDriver(): OpenExchangeRatesApiService
    {
        return new OpenExchangeRatesApiService();
    }

    /**
     * Get the default driver name.
     */
    public function getDefaultDriver(): string
    {
        return $this->config->string('currency.exchange_rates.default_driver');
    }
}
