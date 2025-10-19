<?php
/**
 * Tests the service class for the 'Fixer' exchange rates API.
 *
 * @author Nick Menke <git@nlmenke.net>
 *
 * @since 0.0.0-vertebrae introduced
 */

declare(strict_types=1);

use App\Services\Api\ExchangeRates\FixerApiService;
use DG\BypassFinals;
use Illuminate\Support\Facades\Log;
use Mockery\MockInterface;

use function Pest\Laravel\partialMock;

beforeEach(function (): void {
    // allow final classes to be mocked
    BypassFinals::enable(bypassReadOnly: false);

    config()->set('currency.exchange_rates.drivers.fixer', 'test-api-key');
});

test('getExchangeRates() can return proper data', function (): void {
    // results from API documentation; see: https://fixer.io/documentation#apiresponse
    $apiResult = '{"success":true,"timestamp":1519296206,"base":"EUR","date":"2025-10-16","rates":{"AUD":1.566015,"CAD":1.560132,"CHF":1.154727,"CNY":7.827874,"GBP":0.882047,"JPY":132.360679,"USD":1.23396}}';

    partialMock(FixerApiService::class, function (MockInterface $mock) use ($apiResult): void {
        $mock->shouldReceive('get')
            ->andReturn(json_decode($apiResult, true));
    });

    $result = app(FixerApiService::class)->getExchangerates();

    expect($result)->toBe([
        'AUD' => 1.566015,
        'CAD' => 1.560132,
        'CHF' => 1.154727,
        'CNY' => 7.827874,
        'GBP' => 0.882047,
        'JPY' => 132.360679,
        'USD' => 1.23396,
    ]);
});

test('getExchangeRates() can error gracefully', function (): void {
    partialMock(FixerApiService::class, function (MockInterface $mock): void {
        $mock->shouldReceive('get')
            ->andThrow(new Exception());
    });

    Log::expects('error')
        ->once();

    $result = app(FixerApiService::class)->getExchangeRates();

    expect($result)->toBeEmpty();
});
