<?php
/**
 * Abstract Resource.
 *
 * @package App\Http\Resources
 *
 * @author    Nick Menke <nick@nlmenke.net>
 * @copyright 2018-2019 Nick Menke
 *
 * @link https://github.com/nlmenke/vertebrae
 */

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * The base resource class.
 *
 * This class contains any functionality that would otherwise be duplicated in
 * other resources. All other resources should extend this class.
 *
 * @since x.x.x introduced
 */
abstract class AbstractResource extends JsonResource
{
}
