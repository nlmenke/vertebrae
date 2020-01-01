<?php
/**
 * Form Request Service Provider.
 *
 * @package App\Providers
 *
 * @author    Nick Menke <nick@nlmenke.net>
 * @copyright 2018-2020 Nick Menke
 *
 * @link https://github.com/nlmenke/vertebrae
 */

declare(strict_types=1);

namespace App\Providers;

use App\Http\Requests\AbstractFormRequest;
use Illuminate\Support\ServiceProvider;

/**
 * The Form Request service provider.
 *
 * This service provider is responsible for bootstrapping and registering the
 * application's form requests.
 *
 * @since x.x.x introduced
 */
class FormRequestServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->singleton(AbstractFormRequest::class, function ($app) {
            $routeParts = explode('@', $app['router']->currentRouteAction());
            $routeAction = end($routeParts);

            $classParts = explode('\\', reset($routeParts));
            $className = end($classParts);
            $modelName = str_replace(['ApiController', 'Controller'], '', $className);

            $formRequestVerb = '';
            if ($routeAction === 'store') {
                $formRequestVerb = 'Create';
            } elseif ($routeAction === 'update') {
                $formRequestVerb = 'Update';
            }

            $formRequestName = $formRequestVerb . $modelName . 'Request';

            return $app->make('\App\Http\Requests\\' . $modelName . '\\' . $formRequestName);
        });
    }
}
