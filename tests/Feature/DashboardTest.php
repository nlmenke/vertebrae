<?php

declare(strict_types=1);

use App\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;

test('guests are redirected to the login page', function (): void {
    get(route('dashboard'))
        ->assertRedirect(route('login'));
});

test('authenticated users can visit the dashboard', function (): void {
    $user = User::factory()->create();

    actingAs($user)
        ->get(route('dashboard'))
        ->assertOk();
});
