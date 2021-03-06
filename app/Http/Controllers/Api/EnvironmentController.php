<?php
/**
 * Environment API Controller.
 *
 * @package App\Http\Controllers\Api
 *
 * @author    David Hernandez <hrdavidL@gmail.com>
 * @copyright 2018-2020 Nick Menke
 *
 * @link https://github.com/nlmenke/vertebrae
 */

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

/**
 * The Environment API controller class.
 *
 * This class allows a user to fetch information about the environment on which
 * the application is deployed.
 *
 * @since x.x.x introduced
 */
class EnvironmentController extends AbstractApiController
{
    /**
     * Retrieves environment information for use on the front-end.
     *
     * @param Request $request
     *
     * @return array
     */
    public function getInfo(Request $request)
    {
        return [
            'environment' => env('APP_ENV'),
            'url' => env('APP_URL'),
            'laravel_version' => app()->version(),
        ];
    }
}
