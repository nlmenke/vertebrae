<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
