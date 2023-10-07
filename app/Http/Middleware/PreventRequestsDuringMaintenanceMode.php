<?php
/**
 * Prevent Requests During Maintenance Mode Middleware.
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

use Closure;
use ErrorException;
use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as Middleware;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

/**
 * The Prevent Requests During Maintenance Mode middleware class.
 *
 * This class checks for maintenance mode and prevents incoming requests from
 * being fulfilled. Some pages may be available while in maintenance mode.
 *
 * @since 0.0.0-framework introduced
 */
class PreventRequestsDuringMaintenanceMode extends Middleware
{
    /**
     * The URIs that should be reachable while maintenance mode is enabled.
     *
     * @var array<int, string>
     */
    protected $except = [];

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     *
     * @throws ErrorException
     * @throws HttpException
     *
     * @return mixed
     */
    public function handle($request, Closure $next): mixed
    {
        if ($this->app->isDownForMaintenance() && $request->expectsJson()) {
            return new JsonResponse([
                'message' => 'This application is currently undergoing maintenance.',
            ], Response::HTTP_SERVICE_UNAVAILABLE);
        }

        return parent::handle($request, $next);
    }
}
