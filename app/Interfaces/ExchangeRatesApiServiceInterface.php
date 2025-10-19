<?php
/**
 * Exchange Rate API Service interface.
 *
 * @author Nick Menke <git@nlmenke.net>
 */

declare(strict_types=1);

namespace App\Interfaces;

/**
 * Ensures all exchange rate API services are able to retrieve exchange rates
 * from their respective APIs.
 *
 * @since 0.0.0-vertebrae introduced
 */
interface ExchangeRatesApiServiceInterface
{
    /**
     * Get an array of all exchange rates from the API.
     *
     * @return array<string, float>
     */
    public function getExchangeRates(): array;
}
