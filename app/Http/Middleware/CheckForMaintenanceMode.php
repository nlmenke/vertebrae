<?php declare(strict_types=1);
/**
 * Check for Maintenance Mode Middleware.
 *
 * @package   App\Http\Middleware
 * @author    Taylor Otwell <taylor@laravel.com>
 * @copyright 2018-2019 Nick Menke
 * @link      https://github.com/nlmenke/vertebrae
 */

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode as Middleware;

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
    protected $except = [
        //
    ];
}
