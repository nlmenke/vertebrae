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

use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as Middleware;

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

//    /**
//     * Handle an incoming request.
//     *
//     * @param Request $request
//     * @param Closure $next
//     *
//     * @throws HttpException
//     *
//     * @return JsonResponse|mixed
//     */
//    public function handle($request, Closure $next)
//    {
//        try {
//            parent::handle($request, $next);
//        } catch (MaintenanceModeException $e) {
//            if ($request->expectsJson() || $request->wantsJson()) {
//                return JsonResponse::create([
//                    'message' => $e->getMessage(),
//                ], Response::HTTP_SERVICE_UNAVAILABLE);
//            }
//
//            throw $e;
//        }
//
//        return $next($request);
//    }
}
