<?php
/**
 * Browser tests related to the home page.
 *
 * @author Nick Menke <git@nlmenke.net>
 *
 * @since 0.0.0-vertebrae introduced
 */

declare(strict_types=1);

test('has welcome page', function (): void {
    visit('/')
        ->assertSee('Laravel');
});
