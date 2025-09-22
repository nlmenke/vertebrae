<?php

/**
 * Abstract Request.
 *
 * @package App\Http\Requests
 *
 * @author    Nick Menke <nick@nlmenke.net>
 * @copyright 2018-2020 Nick Menke
 *
 * @link https://github.com/nlmenke/vertebrae
 */

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * The base request class.
 *
 * This class contains any functionality that would otherwise be duplicated in
 * other requests. All other requests should extend this class.
 *
 * @since x.x.x introduced
 */
abstract class AbstractFormRequest extends FormRequest
{
}
