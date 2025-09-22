<?php

/**
 * Auth Service Provider.
 *
 * @package App\Providers
 *
 * @author    Taylor Otwell <taylor@laravel.com>
 * @copyright 2018-2020 Nick Menke
 *
 * @link https://github.com/nlmenke/vertebrae
 */

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

/**
 * The Authentication / Authorization service provider.
 *
 * This service provider is responsible for bootstrapping and registering the
 * application's authentication / authorization services.
 *
 * @since 0.0.0-framework introduced
 */
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->registerPolicies();
    }
}
