<?php

use App\Models\User;

use function Pest\Laravel\{actingAs,get};

test('guests are redirected to the login page', function () {
    get(route('dashboard'))
        ->assertRedirect(route('login'));
});

test('authenticated users can visit the dashboard', function () {
    $user = User::factory()->create();

    actingAs($user)
        ->get(route('dashboard'))
        ->assertOk();
});
