<?php namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\TrimStrings as Middleware;

/**
 * Class TrimStrings
 *
 * @package App\Http\Middleware
 * @author  Nick Menke <nick@nlmenke.net>
 */
class TrimStrings extends Middleware
{
    /**
     * The names of the attributes that should not be trimmed.
     *
     * @var array
     */
    protected $except = [
        'password',
        'password_confirmation',
    ];
}
