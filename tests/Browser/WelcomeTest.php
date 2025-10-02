<?php

declare(strict_types=1);

test('has welcome page', function () {
    visit('/')
        ->assertSee('Laravel');
});
