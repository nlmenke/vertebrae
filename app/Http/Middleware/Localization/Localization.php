<?php declare(strict_types=1);

namespace App\Http\Middleware\Localization;

use Illuminate\Http\Request;

/**
 * Class Localization
 *
 * @package App\Http\Middleware\Localization
 * @author  Nick Menke <nick@nlmenke.net>
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
