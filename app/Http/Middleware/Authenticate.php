<?php

/**
 * Authenticate Middleware.
 *
 * @package App\Http\Middleware
 *
 * @author    Taylor Otwell <taylor@laravel.com>
 * @copyright 2018-2020 Nick Menke
 *
 * @link https://github.com/nlmenke/vertebrae
 */

declare(strict_types=1);

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

/**
 * The Authenticate middleware class.
 *
 * This class checks if a user has been authenticated and allows them to
 * proceed to their expected page or redirects them to login.
 *
 * @since 0.0.0-framework introduced
 */
class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param Request $request
     *
     * @return string|null
     */
    protected function redirectTo($request): ?string
    {
        if (!$request->expectsJson()) {
            return route('login');
        }

        return null;
    }
}
