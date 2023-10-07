<?php
/**
 * Broadcast Service Provider.
 *
 * @package App\Providers
 *
 * @author    Taylor Otwell <taylor@laravel.com>
 * @copyright 2018-2023 Nick Menke
 *
 * @link https://github.com/nlmenke/vertebrae
 */

declare(strict_types=1);

namespace App\Providers;

use Broadcast;
use Illuminate\Support\ServiceProvider;

/**
 * The Broadcast service provider.
 *
 * This service provider is responsible for bootstrapping and registering the
 * application's broadcast services.
 *
 * @since 0.0.0-framework introduced
 */
class BroadcastServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        Broadcast::routes();

        require base_path('routes/channels.php');
    }
}
