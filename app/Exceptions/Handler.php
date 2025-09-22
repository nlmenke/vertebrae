<?php

/**
 * Exception Handler.
 *
 * @package App\Exceptions
 *
 * @author    Taylor Otwell <taylor@laravel.com>
 * @copyright 2018-2020 Nick Menke
 *
 * @link https://github.com/nlmenke/vertebrae
 */

declare(strict_types=1);

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

/**
 * The exception handler class.
 *
 * This class handles exceptions thrown by the application.
 *
 * @since 0.0.0-framework introduced
 */
class Handler extends ExceptionHandler
{
    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [];

    /**
     * Render an exception into an HTTP response.
     *
     * @param Request   $request
     * @param Throwable $exception
     *
     * @throws Throwable
     *
     * @return Response
     */
    public function render($request, Throwable $exception)
    {
        return parent::render($request, $exception);
    }

    /**
     * Report or log an exception.
     *
     * @param Throwable $exception
     *
     * @throws Throwable
     *
     * @return void
     */
    public function report(Throwable $exception): void
    {
        parent::report($exception);
    }
}
