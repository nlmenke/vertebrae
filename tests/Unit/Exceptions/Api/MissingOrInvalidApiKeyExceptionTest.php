<?php
/**
 * Tests exception class for when an API key is missing or invalid.
 *
 * @author Nick Menke <git@nlmenke.net>
 *
 * @since 0.0.0-vertebrae introduced
 */

declare(strict_types=1);

use App\Exceptions\Api\MissingOrInvalidApiKeyException;

test('exception can use the default message', function (): void {
    expect(fn () => throw new MissingOrInvalidApiKeyException())
        ->toThrow(MissingOrInvalidApiKeyException::class, trans('exceptions.api.missing_or_invalid_api_key'));
});

test('exception can use a custom message', function (): void {
    expect(fn () => throw new MissingOrInvalidApiKeyException('Custom exception message.'))
        ->toThrow(MissingOrInvalidApiKeyException::class, 'Custom exception message.');
});
