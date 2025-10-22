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
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Facades\Log;

beforeEach(function (): void {
    // allow final classes to be mocked
    BypassFinals::enable(bypassReadOnly: false);

    config()->set('currency.exchange_rates.drivers.fixer', 'test-api-key');
});

test('getExchangeRates method returns expected data format', function (): void {
    // results from API documentation; see: https://fixer.io/documentation#apiresponse
    $apiResult = '{"success":true,"timestamp":1519296206,"base":"EUR","date":"2025-10-16","rates":{"AUD":1.566015,"CAD":1.560132,"CHF":1.154727,"CNY":7.827874,"GBP":0.882047,"JPY":132.360679,"USD":1.23396}}';

    $mockClient = new Client([
        'handler' => HandlerStack::create(
            new MockHandler([
                new Response(200, [], $apiResult),
            ])
        ),
    ]);

    $result = new FixerApiService($mockClient)
        ->getExchangerates();

    expect($result)->toEqual([
        'AUD' => 1.566015,
        'CAD' => 1.560132,
        'CHF' => 1.154727,
        'CNY' => 7.827874,
        'GBP' => 0.882047,
        'JPY' => 132.360679,
        'USD' => 1.23396,
    ]);
});

test('getExchangeRates method handles errors gracefully', function (): void {
    Log::expects('error')
        ->once();

    $mockClient = new Client([
        'handler' => HandlerStack::create(
            new MockHandler([
                new RequestException(
                    'Test API Error',
                    new Request('GET', 'latest')
                ),
            ])
        ),
    ]);

    $result = new FixerApiService($mockClient)
        ->getExchangeRates();

    expect($result)->toBeEmpty();
});
