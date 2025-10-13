<?php
/**
 * Tests functionality related to user registration.
 *
 * @author Taylor Otwell <taylor@laravel.com>
 * @author Nick Menke <git@nlmenke.net>
 *
 * @since 0.0.0-framework introduced
 * @since 0.0.0-vertebrae converted to Pest
 */

declare(strict_types=1);

use function Pest\Laravel\assertAuthenticated;
use function Pest\Laravel\get;
use function Pest\Laravel\post;

test('registration screen can be rendered', function (): void {
    get(route('register'))
        ->assertOk();
});

test('new users can register', function (): void {
    post(route('register.store'), [
        'name' => 'Test User',
        'email' => 'test@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
    ])
        ->assertRedirect(route('dashboard', absolute: false));

    assertAuthenticated();
});
