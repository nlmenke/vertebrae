<?php
/**
 * Redirect if Authenticated Middleware.
 *
 * @package App\Http\Middleware
 *
 * @author    Taylor Otwell <taylor@laravel.com>
 * @copyright 2018-2023 Nick Menke
 *
 * @link https://github.com/nlmenke/vertebrae
 */

declare(strict_types=1);

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;

/**
 * The Redirect if Authenticated middleware class.
 *
 * This class determines if a user has been authorized to view a specific page.
 * They will be directed to the home page if they do not have clearance.
 *
 * @since 0.0.0-framework introduced
 */
class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param Request     $request
     * @param Closure     $next
     * @param string|null $guard
     *
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            return redirect('/home');
        }

        return $next($request);
    }
}
