<?php
/**
 * Tests functionality of the Update Exchange Rates Job.
 *
 * @author Nick Menke <git@nlmenke.net>
 *
 * @since 0.0.0-vertebrae introduced
 */

declare(strict_types=1);

use App\Jobs\ExchangeRates\UpdateExchangeRatesJob;
use App\Models\Currency;
use Illuminate\Support\Facades\Log;

use function PHPUnit\Framework\assertEquals;

test('can update exchange rates', function (): void {
    config()->set('currency.exchange_rates.drivers.open_exchange_rates', 'test-api-key');

    $currencies = Currency::factory()
        ->count(4)
        ->sequence(
            ['iso_alpha' => 'USD'],
            ['iso_alpha' => 'EUR'],
            ['iso_alpha' => 'JPY'],
            ['iso_alpha' => 'NZD'], // not returned by API
        )
        ->create();

    $exchangeRates = [
        'USD' => 1.0,
        'CHF' => 0.79, // not in the database
        'EUR' => 0.86,
        'JPY' => 150.42,
    ];

    Log::expects('warning')
        ->once();

    app()->make(UpdateExchangeRatesJob::class)->handle($currencies, $exchangeRates);

    $currencies = $currencies->fresh();

    assertEquals($currencies->where('iso_alpha', 'USD')->first()?->exchange_rate, $exchangeRates['USD']);
    assertEquals($currencies->where('iso_alpha', 'EUR')->first()?->exchange_rate, $exchangeRates['EUR']);
    assertEquals($currencies->where('iso_alpha', 'JPY')->first()?->exchange_rate, $exchangeRates['JPY']);
});

test('can error gracefully', function (): void {
    config()->set('currency.exchange_rates.drivers.open_exchange_rates');

    $currencies = Currency::factory()->count(3)->create();
    $exchangeRates = [];

    Log::expects('error')
        ->once();

    app()->make(UpdateExchangeRatesJob::class)->handle($currencies, $exchangeRates);
});
