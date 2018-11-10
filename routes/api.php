<?php

use Illuminate\Routing\Router;

/** @var Router $router */

$router->resource('currencies', 'CurrencyController', ['only' => ['index', 'show', 'store', 'update', 'destroy']]);
