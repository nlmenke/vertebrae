<?php
/**
 * Encrypt Cookies Middleware.
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

use Illuminate\Cookie\Middleware\EncryptCookies as Middleware;

/**
 * The Encrypt Cookies middleware class.
 *
 * This class encrypts and decrypts cookies.
 *
 * @since 0.0.0-framework introduced
 */
class EncryptCookies extends Middleware
{
    /**
     * The names of the cookies that should not be encrypted.
     *
     * @var array
     */
    protected $except = [];
}
