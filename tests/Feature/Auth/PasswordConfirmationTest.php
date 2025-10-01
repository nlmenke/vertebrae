<?php

use App\Models\User;
use Inertia\Testing\AssertableInertia as Assert;

use function Pest\Laravel\{actingAs,get};

test('confirm password screen can be rendered', function () {
    $user = User::factory()->create();

    actingAs($user)
        ->get(route('password.confirm'))
        ->assertOk()
        ->assertInertia(
            fn (Assert $page) => $page
                ->component('auth/ConfirmPassword')
        );
});

test('password confirmation requires authentication', function () {
    get(route('password.confirm'))
        ->assertRedirect(route('login'));
});
