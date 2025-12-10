<?php
/**
 * Tests functionality of the Exchange Rates API Service Manager.
 *
 * @author Nick Menke <git@nlmenke.net>
 *
 * @since 0.0.0-vertebrae introduced
 */

declare(strict_types=1);

use App\Managers\ExchangeRatesApiServiceManager;
use App\Services\Api\ExchangeRates\CurrencyApiApiService;
use App\Services\Api\ExchangeRates\ExchangeRateApiApiService;
use App\Services\Api\ExchangeRates\FixerApiService;
use App\Services\Api\ExchangeRates\OpenExchangeRatesApiService;

use function PHPUnit\Framework\assertInstanceOf;

test('resolves default driver', function (): void {
    config()->set('currency.exchange_rates.drivers.open_exchange_rates', 'test-api-key');

    $manager = app()->make(ExchangeRatesApiServiceManager::class);

    assertInstanceOf(OpenExchangeRatesApiService::class, $manager->driver());
});

test('resolves CurrencyApi driver', function (): void {
    config()->set('currency.exchange_rates.drivers.currency_api', 'test-api-key');

    $manager = app()->make(ExchangeRatesApiServiceManager::class);

    assertInstanceOf(CurrencyApiApiService::class, $manager->driver('currency_api'));
});

test('resolves ExchangeRateApi driver', function (): void {
    config()->set('currency.exchange_rates.drivers.exchangerate_api', 'test-api-key');

    $manager = app()->make(ExchangeRatesApiServiceManager::class);

    assertInstanceOf(ExchangeRateApiApiService::class, $manager->driver('exchangerate_api'));
});

test('resolves Fixer driver', function (): void {
    config()->set('currency.exchange_rates.drivers.fixer', 'test-api-key');

    $manager = app()->make(ExchangeRatesApiServiceManager::class);

    assertInstanceOf(FixerApiService::class, $manager->driver('fixer'));
});

test('resolves OpenExchangeRates driver', function (): void {
    config()->set('currency.exchange_rates.drivers.open_exchange_rates', 'test-api-key');

    $manager = app()->make(ExchangeRatesApiServiceManager::class);

    assertInstanceOf(OpenExchangeRatesApiService::class, $manager->driver('open_exchange_rates'));
});
