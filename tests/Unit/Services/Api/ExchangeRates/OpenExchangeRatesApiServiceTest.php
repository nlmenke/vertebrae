<?php
/**
 * Tests the service class for the 'Open Exchange Rates' exchange rates API.
 *
 * @author Nick Menke <git@nlmenke.net>
 *
 * @since 0.0.0-vertebrae introduced
 */

declare(strict_types=1);

use App\Services\Api\ExchangeRates\OpenExchangeRatesApiService;
use DG\BypassFinals;
use Illuminate\Support\Facades\Log;
use Mockery\MockInterface;

use function Pest\Laravel\partialMock;

beforeEach(function (): void {
    // allow final classes to be mocked
    BypassFinals::enable(bypassReadOnly: false);

    config()->set('currency.exchange_rates.drivers.open_exchange_rates', 'test-api-key');
});

test('getExchangeRates() can return proper data', function (): void {
    // results from API documentation; see: https://docs.openexchangerates.org/reference/api-introduction#api-response-formats
    $apiResult = '{"disclaimer":"https://openexchangerates.org/terms/","license":"https://openexchangerates.org/license/","timestamp":1449877801,"base":"USD","rates":{"AED":3.672538,"AFN":66.809999,"ALL":125.716501,"AMD":484.902502,"ANG":1.788575,"AOA":135.295998,"ARS":9.750101,"AUD":1.390866}}';

    partialMock(OpenExchangeRatesApiService::class, function (MockInterface $mock) use ($apiResult): void {
        $mock->shouldReceive('get')
            ->andReturn(json_decode($apiResult, true));
    });

    $result = app(OpenExchangeRatesApiService::class)->getExchangeRates();

    expect($result)->toBe([
        'AED' => 3.672538,
        'AFN' => 66.809999,
        'ALL' => 125.716501,
        'AMD' => 484.902502,
        'ANG' => 1.788575,
        'AOA' => 135.295998,
        'ARS' => 9.750101,
        'AUD' => 1.390866,
    ]);
});

test('getExchangeRates() can error gracefully', function (): void {
    partialMock(OpenExchangeRatesApiService::class, function (MockInterface $mock): void {
        $mock->shouldReceive('get')
            ->andThrow(new Exception());
    });

    Log::expects('error')
        ->once();

    $result = app(OpenExchangeRatesApiService::class)->getExchangeRates();

    expect($result)->toBeEmpty();
});
