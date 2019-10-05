<?php declare(strict_types=1);
/**
 * App Service Provider.
 *
 * @package   App\Providers
 * @author    Taylor Otwell <taylor@laravel.com>
 * @copyright 2018-2019 Nick Menke
 * @link      https://github.com/nlmenke/vertebrae
 */

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * The Application service provider.
 *
 * This service provider is responsible for bootstrapping and registering the
 * application's core services.
 *
 * @since 0.0.0-framework introduced
 */
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        //
    }
}
