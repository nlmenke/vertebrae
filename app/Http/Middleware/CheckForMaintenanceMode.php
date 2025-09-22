<?php

/**
 * Check for Maintenance Mode Middleware.
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

use Closure;
use Illuminate\Foundation\Http\Exceptions\MaintenanceModeException;
use Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode as Middleware;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

/**
 * The Check for Maintenance Mode middleware class.
 *
 * This class checks for maintenance mode. If maintenance is being done on the
 * application, a page will be displayed letting the user know the page is
 * unavailable. Some pages may be reachable while in maintenance mode.
 *
 * @since 0.0.0-framework introduced
 */
class CheckForMaintenanceMode extends Middleware
{
    /**
     * The URIs that should be reachable while maintenance mode is enabled.
     *
     * @var array
     */
    protected $except = [];

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     *
     * @throws HttpException
     *
     * @return JsonResponse|mixed
     */
    public function handle($request, Closure $next)
    {
        try {
            parent::handle($request, $next);
        } catch (MaintenanceModeException $e) {
            if ($request->expectsJson() || $request->wantsJson()) {
                return JsonResponse::create([
                    'message' => $e->getMessage(),
                ], Response::HTTP_SERVICE_UNAVAILABLE);
            }

            throw $e;
        }

        return $next($request);
    }
}
