<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class BroadcastServiceProvider
 *
 * @package App\Providers
 * @author  Nick Menke <nick@nlmenke.net>
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
        \Broadcast::routes();

        require base_path('routes/channels.php');
    }
}
