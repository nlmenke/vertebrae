<?php

use App\Models\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\URL;

use function Pest\Laravel\actingAs;
use function PHPUnit\Framework\{assertFalse,assertTrue};

test('email verification screen can be rendered', function () {
    $user = User::factory()->unverified()->create();

    actingAs($user)
        ->get(route('verification.notice'))
        ->assertOk();
});

test('email can be verified', function () {
    $user = User::factory()->unverified()->create();

    Event::fake();

    $verificationUrl = URL::temporarySignedRoute(
        'verification.verify',
        now()->addMinutes(60),
        [
            'id' => $user->id,
            'hash' => sha1($user->email),
        ]
    );

    actingAs($user)
        ->get($verificationUrl)
        ->assertRedirect(route('dashboard', [
            'verified' => true
        ], false));

    Event::assertDispatched(Verified::class);

    assertTrue($user->fresh()->hasVerifiedEmail());
});

test('email is not verified with invalid hash', function () {
    $user = User::factory()->unverified()->create();

    Event::fake();

    $verificationUrl = URL::temporarySignedRoute(
        'verification.verify',
        now()->addMinutes(60),
        [
            'id' => $user->id,
            'hash' => sha1('wrong-email'),
        ]
    );

    actingAs($user)
        ->get($verificationUrl);

    Event::assertNotDispatched(Verified::class);

    assertFalse($user->fresh()->hasVerifiedEmail());
});

test('email is not verified with invalid user id', function () {
    $user = User::factory()->unverified()->create();

    Event::fake();

    $verificationUrl = URL::temporarySignedRoute(
        'verification.verify',
        now()->addMinutes(60),
        [
            'id' => 123,
            'hash' => sha1($user->email),
        ]
    );

    actingAs($user)
        ->get($verificationUrl);

    Event::assertNotDispatched(Verified::class);

    assertFalse($user->fresh()->hasVerifiedEmail());
});

test('verified user is redirected to dashboard from verification prompt', function () {
    $user = User::factory()->create();

    Event::fake();

    actingAs($user)
        ->get(route('verification.notice'))
        ->assertRedirect(route('dashboard', absolute: false));

    Event::assertNotDispatched(Verified::class);
});

test('already verified user visiting verification link is redirected without firing event again', function () {
    $user = User::factory()->create();

    Event::fake();

    $verificationUrl = URL::temporarySignedRoute(
        'verification.verify',
        now()->addMinutes(60),
        [
            'id' => $user->id,
            'hash' => sha1($user->email),
        ]
    );

    actingAs($user)
        ->get($verificationUrl)
        ->assertRedirect(route('dashboard', [
            'verified' => true,
        ], false));

    Event::assertNotDispatched(Verified::class);

    assertTrue($user->fresh()->hasVerifiedEmail());
});
