<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

class EnvironmentController extends AbstractApiController
{
    /**
     * @param Request $request
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
