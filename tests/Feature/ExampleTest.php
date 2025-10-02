<?php

declare(strict_types=1);

use function Pest\Laravel\get;

test('returns a successful response', function () {
    get(route('home'))
        ->assertOk();
});
