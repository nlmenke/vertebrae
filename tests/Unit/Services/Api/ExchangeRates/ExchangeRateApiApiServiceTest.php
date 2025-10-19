<?php
/**
 * Tests the service class for the 'ExchangeRate-API' exchange rates API.
 *
 * @author Nick Menke <git@nlmenke.net>
 *
 * @since 0.0.0-vertebrae introduced
 */

declare(strict_types=1);

use App\Services\Api\ExchangeRates\ExchangeRateApiApiService;
use DG\BypassFinals;
use Illuminate\Support\Facades\Log;
use Mockery\MockInterface;

use function Pest\Laravel\partialMock;

beforeEach(function (): void {
    // allow final classes to be mocked
    BypassFinals::enable(bypassReadOnly: false);

    config()->set('currency.exchange_rates.drivers.exchangerate_api', 'test-api-key');
});

test('getExchangeRates() can return proper data', function (): void {
    // results from API documentation; see: https://www.exchangerate-api.com/docs/standard-requests
    $apiResult = '{"result": "success","documentation":"https://www.exchangerate-api.com/docs","terms_of_use":"https://www.exchangerate-api.com/terms","time_last_update_unix":1585267200,"time_last_update_utc":"Fri, 27 Mar 2020 00:00:00 +0000","time_next_update_unix":1585353700,"time_next_update_utc":"Sat, 28 Mar 2020 00:00:00 +0000","base_code":"USD","conversion_rates":{"USD":1,"AUD":1.4817,"BGN":1.7741,"CAD":1.3168,"CHF":0.9774,"CNY":6.9454,"EGP":15.7361,"EUR":0.9013,"GBP":0.7679}}';

    partialMock(ExchangeRateApiApiService::class, function (MockInterface $mock) use ($apiResult): void {
        $mock->shouldReceive('get')
            ->andReturn(json_decode($apiResult, true));
    });

    $result = app(ExchangeRateApiApiService::class)->getExchangeRates();

    expect($result)->toEqual([
        'USD' => 1.0,
        'AUD' => 1.4817,
        'BGN' => 1.7741,
        'CAD' => 1.3168,
        'CHF' => 0.9774,
        'CNY' => 6.9454,
        'EGP' => 15.7361,
        'EUR' => 0.9013,
        'GBP' => 0.7679,
    ]);
});

test('getExchangeRates() can error gracefully', function (): void {
    partialMock(ExchangeRateApiApiService::class, function (MockInterface $mock): void {
        $mock->shouldReceive('get')
            ->andThrow(new Exception());
    });

    Log::expects('error')
        ->once();

    $result = app(ExchangeRateApiApiService::class)->getExchangeRates();

    expect($result)->toBeEmpty();
});
