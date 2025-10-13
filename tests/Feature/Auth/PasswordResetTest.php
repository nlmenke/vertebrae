<?php
/**
 * Tests functionality related to resetting user passwords.
 *
 * @author Taylor Otwell <taylor@laravel.com>
 * @author Nick Menke <git@nlmenke.net>
 *
 * @since 0.0.0-framework introduced
 * @since 0.0.0-vertebrae converted to Pest
 */

declare(strict_types=1);

use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\Notification;

use function Pest\Laravel\get;
use function Pest\Laravel\post;

test('reset password link screen can be rendered', function (): void {
    get(route('password.request'))
        ->assertOk();
});

test('reset password link can be requested', function (): void {
    Notification::fake();

    $user = User::factory()->create();

    post(route('password.email'), [
        'email' => $user->email,
    ]);

    Notification::assertSentTo($user, ResetPassword::class);
});

test('reset password screen can be rendered', function (): void {
    Notification::fake();

    $user = User::factory()->create();

    post(route('password.email'), [
        'email' => $user->email,
    ]);

    Notification::assertSentTo($user, ResetPassword::class, function (ResetPassword $notification): bool {
        get(route('password.reset', $notification->token))
            ->assertOk();

        return true;
    });
});

test('password can be reset with valid token', function (): void {
    Notification::fake();

    $user = User::factory()->create();

    post(route('password.email'), [
        'email' => $user->email,
    ]);

    Notification::assertSentTo($user, ResetPassword::class, function (ResetPassword $notification) use ($user): bool {
        post(route('password.store'), [
            'token' => $notification->token,
            'email' => $user->email,
            'password' => 'password',
            'password_confirmation' => 'password',
        ])
            ->assertSessionHasNoErrors()
            ->assertRedirect(route('login'));

        return true;
    });
});

test('password cannot be reset with invalid token', function (): void {
    $user = User::factory()->create();

    post(route('password.store'), [
        'token' => 'invalid-token',
        'email' => $user->email,
        'password' => 'newpassword123',
        'password_confirmation' => 'newpassword123',
    ])
        ->assertSessionHasErrors('email');
});
