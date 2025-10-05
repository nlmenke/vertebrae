<?php
/**
 * Settings routes.
 *
 * These routes are included in the "web" routes file.
 *
 * @author Taylor Otwell <taylor@laravel.com>
 *
 * @since 0.0.0-framework introduced
 */

declare(strict_types=1);

use App\Http\Controllers\Settings\PasswordController;
use App\Http\Controllers\Settings\ProfileController;
use App\Http\Controllers\Settings\TwoFactorAuthenticationController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::middleware('auth')->group(function (): void {
    Route::redirect('settings', '/settings/profile');

    Route::get('settings/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');
    Route::patch('settings/profile', [ProfileController::class, 'update'])
        ->name('profile.update');
    Route::delete('settings/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    Route::get('settings/password', [PasswordController::class, 'edit'])
        ->name('password.edit');
    Route::middleware('throttle:6,1')
        ->put('settings/password', [PasswordController::class, 'update'])
        ->name('password.update');

    Route::get('settings/appearance', fn () => Inertia::render('settings/Appearance'))
        ->name('appearance.edit');

    Route::get('settings/two-factor', [TwoFactorAuthenticationController::class, 'show'])
        ->name('two-factor.show');
});
