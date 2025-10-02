<?php

use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\Notification;

use function Pest\Laravel\{get,post};

test('reset password link screen can be rendered', function () {
    get(route('password.request'))
        ->assertOk();
});

test('reset password link can be requested', function () {
    Notification::fake();

    $user = User::factory()->create();

    post(route('password.email'), [
        'email' => $user->email,
    ]);

    Notification::assertSentTo($user, ResetPassword::class);
});

test('reset password screen can be rendered', function () {
    Notification::fake();

    $user = User::factory()->create();

    post(route('password.email'), [
        'email' => $user->email,
    ]);

    Notification::assertSentTo($user, ResetPassword::class, function (ResetPassword $notification) {
        get(route('password.reset', $notification->token))
            ->assertOk();

        return true;
    });
});

test('password can be reset with valid token', function () {
    Notification::fake();

    $user = User::factory()->create();

    post(route('password.email'), [
        'email' => $user->email,
    ]);

    Notification::assertSentTo($user, ResetPassword::class, function (ResetPassword $notification) use ($user) {
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

test('password cannot be reset with invalid token', function () {
    $user = User::factory()->create();

    post(route('password.store'), [
        'token' => 'invalid-token',
        'email' => $user->email,
        'password' => 'newpassword123',
        'password_confirmation' => 'newpassword123',
    ])
        ->assertSessionHasErrors('email');
});
