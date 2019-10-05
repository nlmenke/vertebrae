<?php declare(strict_types=1);
/**
 * Trust Proxies Middleware.
 *
 * @package   App\Http\Middleware
 * @author    Taylor Otwell <taylor@laravel.com>
 * @copyright 2018-2019 Nick Menke
 * @link      https://github.com/nlmenke/vertebrae
 */

namespace App\Http\Middleware;

use Fideloper\Proxy\TrustProxies as Middleware;
use Illuminate\Http\Request;

/**
 * The Trust Proxies middleware class.
 *
 * This class allows for correct URL generation, redirecting, session handling,
 * and logging when behind a proxy. This can be useful if your web server is
 * preceded by a load balancer, HTTP cache, or other intermediary proxy.
 *
 * @since 0.0.0-framework introduced
 */
class TrustProxies extends Middleware
{
    /**
     * The trusted proxies for this application.
     *
     * @var array|string
     */
    protected $proxies;

    /**
     * The headers that should be used to detect proxies.
     *
     * @var int
     */
    protected $headers = Request::HEADER_X_FORWARDED_ALL;
}
