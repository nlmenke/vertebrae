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

    config()->set('currency.exchange_rates.drivers.open_exchange_rates', 'test-api-key');
});

test('getExchangeRates method returns expected data format', function (): void {
    // results from API documentation; see: https://docs.openexchangerates.org/reference/api-introduction#api-response-formats
    $apiResult = '{"disclaimer":"https://openexchangerates.org/terms/","license":"https://openexchangerates.org/license/","timestamp":1449877801,"base":"USD","rates":{"AED":3.672538,"AFN":66.809999,"ALL":125.716501,"AMD":484.902502,"ANG":1.788575,"AOA":135.295998,"ARS":9.750101,"AUD":1.390866}}';

    $mockClient = new Client([
        'handler' => HandlerStack::create(
            new MockHandler([
                new Response(200, [], $apiResult),
            ])
        ),
    ]);

    $result = new OpenExchangeRatesApiService($mockClient)
        ->getExchangeRates();

    expect($result)->toEqual([
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

test('getExchangeRates method handles errors gracefully', function (): void {
    Log::expects('error')
        ->once();

    $mockClient = new Client([
        'handler' => HandlerStack::create(
            new MockHandler([
                new RequestException(
                    'Test API Error',
                    new Request('GET', 'latest.json')
                ),
            ])
        ),
    ]);

    $result = new OpenExchangeRatesApiService($mockClient)
        ->getExchangeRates();

    expect($result)->toBeEmpty();
});
