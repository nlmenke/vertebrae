<?php
/**
 * Tests functionality related to two-factor authentication challenges.
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
use Laravel\Fortify\Features;

use function Pest\Laravel\get;
use function Pest\Laravel\post;

test('two factor challenge redirects to login when not authenticated', function (): void {
    if (! Features::canManageTwoFactorAuthentication()) {
        $this->markTestSkipped('Two-factor authentication is not enabled.');
    }

    get(route('two-factor.login'))
        ->assertRedirect(route('login'));
});

test('two factor challenge can be rendered', function (): void {
    if (! Features::canManageTwoFactorAuthentication()) {
        $this->markTestSkipped('Two-factor authentication is not enabled.');
    }

    Features::twoFactorAuthentication([
        'confirm' => true,
        'confirmPassword' => true,
    ]);

    $user = User::factory()->create();

    $user->forceFill([
        'two_factor_secret' => encrypt('test-secret'),
        'two_factor_recovery_codes' => encrypt(json_encode(['code1', 'code2'])),
        'two_factor_confirmed_at' => now(),
    ])->save();

    post(route('login'), [
        'email' => $user->email,
        'password' => 'password',
    ]);

    get(route('two-factor.login'))
        ->assertOk()
        ->assertInertia(
            fn (AssertableInertia $page): AssertableInertia => $page
                ->component('auth/TwoFactorChallenge')
        );
});
