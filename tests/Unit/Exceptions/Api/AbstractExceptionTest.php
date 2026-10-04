<?php
/**
 * Tests base exception class.
 *
 * @author Nick Menke <git@nlmenke.net>
 *
 * @since 0.0.0-vertebrae introduced
 */

declare(strict_types=1);

use App\Exceptions\AbstractException;

test('exception can use the default message', function (): void {
    expect(fn () => throw new class() extends AbstractException {})
        ->toThrow(AbstractException::class, 'Whoops, something went wrong.');
});

test('exception can use a custom message', function (): void {
    expect(fn () => throw new class('Custom exception message.') extends AbstractException {})
        ->toThrow(AbstractException::class, 'Custom exception message.');
});
