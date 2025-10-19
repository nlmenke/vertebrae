<?php
/**
 * Tests the service class for the 'CurrencyAPI' exchange rates API.
 *
 * @author Nick Menke <git@nlmenke.net>
 *
 * @since 0.0.0-vertebrae introduced
 */

declare(strict_types=1);

use App\Services\Api\ExchangeRates\CurrencyApiApiService;
use DG\BypassFinals;
use Illuminate\Support\Facades\Log;
use Mockery\MockInterface;

use function Pest\Laravel\partialMock;

beforeEach(function (): void {
    // allow final classes to be mocked
    BypassFinals::enable(bypassReadOnly: false);

    config()->set('currency.exchange_rates.drivers.currency_api', 'test-api-key');
});

test('getExchangeRates() can return proper data', function (): void {
    // results from API documentation; see: https://currencyapi.com/docs/latest#latest-currency-exchange-data
    $apiResult = '{"meta":{"last_updated_at":"2023-06-23T10:15:59Z"},"data":{"AED":{"code":"AED","value":3.67306},"AFN":{"code":"AFN","value":91.80254},"ALL":{"code":"ALL","value":108.22904},"AMD":{"code":"AMD","value":480.41659}}}';

    partialMock(CurrencyApiApiService::class, function (MockInterface $mock) use ($apiResult): void {
        $mock->shouldReceive('get')
            ->andReturn(json_decode($apiResult, true));
    });

    $result = app(CurrencyApiApiService::class)->getExchangerates();

    expect($result)->toEqual([
        'AED' => 3.67306,
        'AFN' => 91.80254,
        'ALL' => 108.22904,
        'AMD' => 480.41659,
    ]);
});

test('getExchangeRates() can error gracefully', function (): void {
    partialMock(CurrencyApiApiService::class, function (MockInterface $mock): void {
        $mock->shouldReceive('get')
            ->andThrow(new Exception());
    });

    Log::expects('error')
        ->once();

    $result = app(CurrencyApiApiService::class)->getExchangerates();

    expect($result)->toBeEmpty();
});
