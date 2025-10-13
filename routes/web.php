<?php
/**
 * Web routes.
 *
 * @author Taylor Otwell <taylor@laravel.com>
 * @author Nick Menke <git@nlmenke.net>
 *
 * @since 0.0.0-framework introduced
 * @since 0.0.0-vertebrae add routes for starter kit
 */

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

require __DIR__ . '/admin.php';
require __DIR__ . '/auth.php';
require __DIR__ . '/settings.php';

Route::get('/', fn () => Inertia::render('Welcome'))
    ->name('home');

Route::middleware([
    'auth',
    'verified',
])->group(function (): void {
    Route::get('dashboard', fn () => Inertia::render('Dashboard'))
        ->name('dashboard');
});
