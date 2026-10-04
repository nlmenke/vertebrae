<?php
/**
 * Application service provider.
 *
 * @author Taylor Otwell <taylor@laravel.com>
 * @author Nick Menke <git@nlmenke.net>
 */

declare(strict_types=1);

namespace App\Providers;

use Carbon\CarbonImmutable;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;

/**
 * Registers and bootstraps the application services and core application
 * components.
 *
 * @since 0.0.0-framework introduced
 * @since 0.0.0-vertebrae add service configuration
 */
final class AppServiceProvider extends ServiceProvider
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
        $this->configureCommands();
        $this->configureDates();
        $this->configureModels();
        $this->configurePasswords();
        $this->configureRateLimiting();
        $this->configureUrl();
        $this->configureVite();
    }

    /**
     * Configure the application's commands.
     *
     * @since 0.0.0-vertebrae introduced
     *
     * @link https://laravel-news.com/prevent-destructive-commands-from-running-in-laravel-11
     */
    private function configureCommands(): void
    {
        DB::prohibitDestructiveCommands($this->app->isProduction());
    }

    /**
     * Configure the application's dates.
     *
     * @since 0.0.0-vertebrae introduced
     *
     * @link https://dyrynda.com.au/blog/laravel-immutable-dates
     */
    private function configureDates(): void
    {
        Date::use(CarbonImmutable::class);
    }

    /**
     * Configure the application's models.
     *
     * @since 0.0.0-vertebrae introduced
     *
     * @link https://laravel.com/docs/eloquent#configuring-eloquent-strictness
     * @link https://laravel.com/docs/eloquent-relationships#automatic-eager-loading
     */
    private function configureModels(): void
    {
        Model::automaticallyEagerLoadRelationships($this->app->isProduction());
        Model::shouldBeStrict($this->app->isLocal());
        Model::unguard();
    }

    /**
     * Configure the application's password requirements.
     *
     * @since 0.0.0-vertebrae introduced
     *
     * @link https://laravel.com/docs/validation#defining-default-password-rules
     * @link https://laravel.com/docs/validation#validating-passwords
     *
     * @codeCoverageIgnore
     */
    private function configurePasswords(): void
    {
        Password::defaults(
            fn (): ?Password => app()
                ->isProduction()
                ? Password::min(12)
                    ->max(255)
                    ->uncompromised()
                : null
        );
    }

    /**
     * Configure the application's rate limiting.
     *
     * @since 0.0.0-vertebrae introduced
     *
     * @link https://laravel.com/docs/routing#rate-limiting
     */
    private function configureRateLimiting(): void
    {
        RateLimiter::for(
            'register',
            fn (Request $request) => Limit::perMinute(1)
                ->by($request->ip())
        );
    }

    /**
     * Configure the application's URL.
     *
     * @since 0.0.0-vertebrae introduced
     *
     * @link https://laravel.com/docs/octane#serving-your-application-via-https
     */
    private function configureUrl(): void
    {
        URL::forceHttps($this->app->isProduction());
    }

    /**
     * Configure the application's Vite instance.
     *
     * @since 0.0.0-vertebrae introduced
     *
     * @link https://github.com/laravel/framework/pull/52462
     */
    private function configureVite(): void
    {
        Vite::useAggressivePrefetching();
    }
}
