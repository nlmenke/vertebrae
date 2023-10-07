<?php
/**
 * Facade Service Provider.
 *
 * @package App\Providers
 *
 * @author    Nick Menke <nick@nlmenke.net>
 * @copyright 2018-2023 Nick Menke
 *
 * @link https://github.com/nlmenke/vertebrae
 */

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * The Facade service provider.
 *
 * This service provider is responsible for bootstrapping and registering the
 * application's facades.
 *
 * @since x.x.x introduced
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
        return [];
    }

    /**
     * Register the service providers.
     *
     * @return void
     */
    public function register(): void
    {
    }
}
