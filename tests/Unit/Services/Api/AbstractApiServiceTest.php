<?php
/**
 * Tests base API service class.
 *
 * @author Nick Menke <git@nlmenke.net>
 *
 * @since 0.0.0-vertebrae introduced
 */

declare(strict_types=1);

use App\Services\Api\AbstractApiService;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;

/**
 * Creates a mock service instance for testing.
 *
 * @param array<int, mixed>|null $handlerQueue
 */
function createMockService(?array $handlerQueue): AbstractApiService
{
    $mockHandler = new MockHandler($handlerQueue);
    $mockClient = new Client([
        'handler' => HandlerStack::create($mockHandler),
    ]);

    return new class($mockClient) extends AbstractApiService {};
}

test('can perform GET requests successfully', function (): void {
    $handlerQueue = [
        new Response(200, [], '{"data": "Test GET Response"}'),
    ];

    $callbackRan = false;
    $result = createMockService($handlerQueue)
        ->get('/', 1, [], function () use (&$callbackRan): void {
            $callbackRan = true;
        });

    expect($result)->toBe(['data' => 'Test GET Response'])
        ->and($callbackRan)->toBeTrue();
});

test('handles GET request exceptions correctly', function (): void {
    $handlerQueue = [
        new RequestException('Test GET Error', new Request('GET', 'test')),
    ];

    $result = createMockService($handlerQueue)
        ->get('/test');

    expect($result)->toBe(['error' => 'Test GET Error']);
});

test('can perform POST requests successfully', function (): void {
    $handlerQueue = [
        new Response(201, [], '{"data": "Test POST Response"}'),
    ];

    $callbackRan = false;
    $result = createMockService($handlerQueue)
        ->post('/test', 1, ['name' => 'Test Post'], function () use (&$callbackRan): void {
            $callbackRan = true;
        });

    expect($result)->toBe(['data' => 'Test POST Response'])
        ->and($callbackRan)->toBeTrue();
});

test('handles POST request exceptions correctly', function (): void {
    $handlerQueue = [
        new RequestException('Test POST Error', new Request('POST', 'test')),
    ];

    $result = createMockService($handlerQueue)
        ->post('/test', 1, ['name' => 'Test Post']);

    expect($result)->toBe(['error' => 'Test POST Error']);
});

test('can perform PUT requests successfully', function (): void {
    $handlerQueue = [
        new Response(200, [], '{"data": "Test PUT Response"}'),
    ];

    $callbackRan = false;
    $result = createMockService($handlerQueue)
        ->put('/test', 1, ['name' => 'Test Put'], function () use (&$callbackRan): void {
            $callbackRan = true;
        });

    expect($result)->toBe(['data' => 'Test PUT Response'])
        ->and($callbackRan)->toBeTrue();
});

test('handles PUT request exceptions correctly', function (): void {
    $handlerQueue = [
        new RequestException('Test PUT Error', new Request('PUT', 'test')),
    ];

    $result = createMockService($handlerQueue)
        ->put('/test', 1, ['name' => 'Test Put']);

    expect($result)->toBe(['error' => 'Test PUT Error']);
});

test('can perform DELETE requests successfully', function (): void {
    $handlerQueue = [
        new Response(204, [], '{}'),
    ];

    $callbackRan = false;
    $result = createMockService($handlerQueue)
        ->delete('/test', 1, function () use (&$callbackRan): void {
            $callbackRan = true;
        });

    expect($result)->toBe([])
        ->and($callbackRan)->toBeTrue();
});

test('handles DELETE request exceptions correctly', function (): void {
    $handlerQueue = [
        new RequestException('Test DELETE Error', new Request('DELETE', 'test')),
    ];

    $result = createMockService($handlerQueue)
        ->delete('/test', 1);

    expect($result)->toBe(['error' => 'Test DELETE Error']);
});

test('can add additional headers to requests', function (): void {
    $handlerQueue = [
        new Response(200, [], '{}'),
    ];

    $service = createMockService($handlerQueue);

    $reflection = new ReflectionClass($service);
    $headerMethod = $reflection->getMethod('headers');
    $headerListProperty = $reflection->getProperty('headerList');

    $headerMethod->invokeArgs($service, [['X-Test-Header' => 'Test Header']]);

    expect($headerListProperty->getValue($service))->toBe([
        'Accept' => 'application/json',
        'X-Test-Header' => 'Test Header',
    ]);
});
