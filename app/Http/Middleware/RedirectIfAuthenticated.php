<?php namespace App\Http\Middleware;

use Illuminate\Http\Request;

/**
 * Class RedirectIfAuthenticated
 *
 * @package App\Http\Middleware
 * @author  Nick Menke <nick@nlmenke.net>
 */
class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param Request     $request
     * @param \Closure    $next
     * @param string|null $guard
     * @return mixed
     */
    public function handle(Request $request, \Closure $next, string $guard = null)
    {
        if (\Auth::guard($guard)->check()) {
            return redirect('/home');
        }

        return $next($request);
    }
}
