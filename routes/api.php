<?php
/**
 * API Routes.
 *
 * Here is where you can register API routes for your application. These
 * routes are loaded by the RouteServiceProvider within a group which
 * is assigned the `api` middleware group. Enjoy building your API!
 *
 * @package Routes
 *
 * @author    Taylor Otwell <taylor@laravel.com>
 * @author    Nick Menke <nick@nlmenke.net>
 * @copyright 2018-2020 Nick Menke
 *
 * @link  https://github.com/nlmenke/vertebrae
 * @since 0.0.0-framework introduced
 */

declare(strict_types=1);

use Illuminate\Routing\Router;

/* @var Router $router */

$router->group(['prefix' => 'meta'], function (Router $router): void {
    $router->get('environment', 'EnvironmentController@getInfo');
});

$router->group(['prefix' => 'v1'], function (Router $router): void {
    $router->resource('countries', 'CountryApiController', ['only' => ['index', 'show', 'store', 'update', 'destroy']]);
    $router->resource('currencies', 'CurrencyApiController', ['only' => ['index', 'show', 'store', 'update', 'destroy']]);
    $router->resource('languages', 'LanguageApiController', ['only' => ['index', 'show', 'store', 'update', 'destroy']]);
    $router->resource('locales', 'LocaleApiController', ['only' => ['index', 'show', 'store', 'update', 'destroy']]);
});
