<?php

/**
 * Web Routes.
 *
 * Here is where you can register web routes for your application. These
 * routes are loaded by the RouteServiceProvider within a group which
 * contains the `web` middleware group. Now create something great!
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

Auth::routes();

//$router->get('/', 'DashboardController@index');
//$router->get('/home', 'HomeController@index')->name('home');

$router->get('{any}', 'SinglePageController@index')->where('any', '.*');
