<?php declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class FacadeServiceProvider
 *
 * @package App\Providers
 * @author  Nick Menke <nick@nlmenke.net>
 */
class FacadeServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides(): array
    {
        return [
            //
        ];
    }

    /**
     * Register the service providers.
     *
     * @return void
     */
    public function register(): void
    {
        //
    }
}
