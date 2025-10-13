<?php
/**
 * Fortify service provider.
 *
 * @author Taylor Otwell <taylor@laravel.com>
 */

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;
use Laravel\Fortify\Fortify;

/**
 * Registers and bootstraps the Fortify service components.
 *
 * @since 0.0.0-framework introduced
 */
final class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Fortify::twoFactorChallengeView(fn () => Inertia::render('auth/TwoFactorChallenge'));
        Fortify::confirmPasswordView(fn () => Inertia::render('auth/ConfirmPassword'));

        RateLimiter::for(
            'two-factor',
            fn (Request $request) => Limit::perMinute(5)
                ->by($request->session()->get('login.id'))
        );
    }
}
