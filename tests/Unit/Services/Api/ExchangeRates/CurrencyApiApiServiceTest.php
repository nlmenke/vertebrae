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

    config()->set('currency.exchange_rates.drivers.currency_api', 'test-api-key');
});

test('getExchangeRates method returns expected data format', function (): void {
    // results from API documentation; see: https://currencyapi.com/docs/latest#latest-currency-exchange-data
    $apiResult = '{"meta":{"last_updated_at":"2023-06-23T10:15:59Z"},"data":{"AED":{"code":"AED","value":3.67306},"AFN":{"code":"AFN","value":91.80254},"ALL":{"code":"ALL","value":108.22904},"AMD":{"code":"AMD","value":480.41659}}}';

    $mockClient = new Client([
        'handler' => HandlerStack::create(
            new MockHandler([
                new Response(200, [], $apiResult),
            ])
        ),
    ]);

    $result = new CurrencyApiApiService($mockClient)
        ->getExchangerates();

    expect($result)->toEqual([
        'AED' => 3.67306,
        'AFN' => 91.80254,
        'ALL' => 108.22904,
        'AMD' => 480.41659,
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

    $result = new CurrencyApiApiService($mockClient)
        ->getExchangerates();

    expect($result)->toBeEmpty();
});
