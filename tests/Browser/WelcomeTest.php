<?php

declare(strict_types=1);

test('has welcome page', function (): void {
    visit('/')
        ->assertSee('Laravel');
});
