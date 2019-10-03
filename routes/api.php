<?php declare(strict_types=1);

use Illuminate\Routing\Router;

/** @var Router $router */

$router->resource('countries', 'CountryApiController', ['only' => ['index', 'show', 'store', 'update', 'destroy']]);
$router->resource('currencies', 'CurrencyApiController', ['only' => ['index', 'show', 'store', 'update', 'destroy']]);
$router->resource('languages', 'LanguageApiController', ['only' => ['index', 'show', 'store', 'update', 'destroy']]);
$router->resource('locales', 'LocaleApiController', ['only' => ['index', 'show', 'store', 'update', 'destroy']]);
