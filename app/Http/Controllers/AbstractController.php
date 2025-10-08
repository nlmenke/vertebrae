<?php
/**
 * Abstract controller.
 *
 * @author Taylor Otwell <taylor@laravel.com>
 * @author Nick Menke <git@nlmenke.net>
 */

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;

/**
 * Base controller that all other controllers extend.
 *
 * @since 0.0.0-framework introduced
 * @since 0.0.0-vertebrae renamed to AbstractController with added abstraction
 */
abstract class AbstractController
{
    use AuthorizesRequests;
    use ValidatesRequests;
}
