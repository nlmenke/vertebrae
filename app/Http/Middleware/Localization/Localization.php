<?php

/**
 * Localization Middleware.
 *
 * @package App\Http\Middleware\Localization
 *
 * @author    Nick Menke <nick@nlmenke.net>
 * @copyright 2018-2020 Nick Menke
 *
 * @link https://github.com/nlmenke/vertebrae
 */

declare(strict_types=1);

namespace App\Http\Middleware\Localization;

use Illuminate\Http\Request;

/**
 * The Localization middleware class.
 *
 * This class determines if a url should be localized and sets the locale
 * (language) of the application based on the current URI.
 *
 * @since x.x.x introduced
 */
class Localization
{
    /**
     * URIs that should not be localized.
     *
     * @var array
     */
    protected $except = [];

    /**
     * Determine if the requested URI should not be localized.
     *
     * @param Request $request
     *
     * @return bool
     */
    protected function shouldIgnore(Request $request): bool
    {
        foreach ($this->except as $except) {
            if ($except !== '/') {
                $except = trim($except, '/');
            }

            if ($request->fullUrlIs($except) || $request->is($except)) {
                return true;
            }
        }

        return false;
    }
}
