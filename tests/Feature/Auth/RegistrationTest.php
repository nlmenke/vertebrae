<?php

use function Pest\Laravel\{assertAuthenticated,get,post};

test('registration screen can be rendered', function () {
    get(route('register'))
        ->assertOk();
});

test('new users can register', function () {
    post(route('register.store'), [
        'name' => 'Test User',
        'email' => 'test@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
    ])
        ->assertRedirect(route('dashboard', absolute: false));

    assertAuthenticated();
});
