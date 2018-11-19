<?php

use Illuminate\Routing\Router;

/** @var Router $router */

$router->resource('countries', 'CountryApiController', ['only' => ['index', 'show', 'store', 'update', 'destroy']]);
$router->resource('currencies', 'CurrencyApiController', ['only' => ['index', 'show', 'store', 'update', 'destroy']]);
