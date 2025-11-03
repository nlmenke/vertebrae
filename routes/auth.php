<?php
/**
 * Authentication routes.
 *
 * These routes are included in the "web" routes file.
 *
 * @author Taylor Otwell <taylor@laravel.com>
 *
 * @since 0.0.0-framework introduced
 */

declare(strict_types=1);

use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function (): void {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');
    Route::post('register', [RegisteredUserController::class, 'store'])
        ->name('register.store');
});
