<?php namespace App\Providers;

use App\Http\Requests\AbstractFormRequest;
use Illuminate\Support\ServiceProvider;

/**
 * Class FormRequestServiceProvider
 *
 * @package App\Providers
 * @author  Nick Menke <nick@nlmenke.net>
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
