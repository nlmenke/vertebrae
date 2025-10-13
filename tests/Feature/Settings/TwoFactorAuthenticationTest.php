<?php
/**
 * Tests functionality related to updating two-factor authentication settings.
 *
 * @author Taylor Otwell <taylor@laravel.com>
 * @author Nick Menke <git@nlmenke.net>
 *
 * @since  0.0.0-framework introduced
 * @since  0.0.0-vertebrae converted to Pest
 */

declare(strict_types=1);

use App\Models\User;
use Inertia\Testing\AssertableInertia;
use Laravel\Fortify\Features;

use function Pest\Laravel\actingAs;

test('two factor settings page can be rendered', function (): void {
    if (! Features::canManageTwoFactorAuthentication()) {
        $this->markTestSkipped('Two-factor authentication is not enabled.');
    }

    Features::twoFactorAuthentication([
        'confirm' => true,
        'confirmPassword' => true,
    ]);

    $user = User::factory()->create();

    actingAs($user)
        ->withSession([
            'auth.password_confirmed_at' => time(),
        ])
        ->get(route('two-factor.show'))
        ->assertInertia(
            fn (AssertableInertia $page): AssertableInertia => $page
                ->component('settings/TwoFactor')
                ->where('twoFactorEnabled', false)
        );
});

test('two factor settings page requires password confirmation when enabled', function (): void {
    if (! Features::canManageTwoFactorAuthentication()) {
        $this->markTestSkipped('Two-factor authentication is not enabled.');
    }

    $user = User::factory()->create();

    Features::twoFactorAuthentication([
        'confirm' => true,
        'confirmPassword' => true,
    ]);

    actingAs($user)
        ->get(route('two-factor.show'))
        ->assertRedirect(route('password.confirm'));
});

test('two factor settings page does not requires password confirmation when disabled', function (): void {
    if (! Features::canManageTwoFactorAuthentication()) {
        $this->markTestSkipped('Two-factor authentication is not enabled.');
    }

    $user = User::factory()->create();

    Features::twoFactorAuthentication([
        'confirm' => true,
        'confirmPassword' => false,
    ]);

    actingAs($user)
        ->get(route('two-factor.show'))
        ->assertOk()
        ->assertInertia(
            fn (AssertableInertia $page): AssertableInertia => $page
                ->component('settings/TwoFactor')
        );
});

test('two factor settings page returns forbidden response when two factor is disabled', function (): void {
    if (! Features::canManageTwoFactorAuthentication()) {
        $this->markTestSkipped('Two-factor authentication is not enabled.');
    }

    config([
        'fortify.features' => [],
    ]);

    $user = User::factory()->create();

    actingAs($user)
        ->withSession(['auth.password_confirmed_at' => time()])
        ->get(route('two-factor.show'))
        ->assertForbidden();
});
