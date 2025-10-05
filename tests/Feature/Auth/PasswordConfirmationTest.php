<?php
/**
 * Tests functionality related to password confirmation.
 *
 * @author Taylor Otwell <taylor@laravel.com>
 * @author Nick Menke <git@nlmenke.net>
 *
 * @since 0.0.0-framework introduced
 * @since 0.0.0-vertebrae converted to Pest
 */

declare(strict_types=1);

use App\Models\User;
use Inertia\Testing\AssertableInertia;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;

test('confirm password screen can be rendered', function (): void {
    $user = User::factory()->create();

    actingAs($user)
        ->get(route('password.confirm'))
        ->assertOk()
        ->assertInertia(
            fn (AssertableInertia $page): AssertableInertia => $page
                ->component('auth/ConfirmPassword')
        );
});

test('password confirmation requires authentication', function (): void {
    get(route('password.confirm'))
        ->assertRedirect(route('login'));
});
