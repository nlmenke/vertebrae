<?php
/**
 * Currency Resource.
 *
 * @package App\Http\Resources\Currency
 *
 * @author    Nick Menke <nick@nlmenke.net>
 * @copyright 2018-2019 Nick Menke
 *
 * @link https://github.com/nlmenke/vertebrae
 */

declare(strict_types=1);

namespace App\Http\Resources\Currency;

use App\Entities\Currency\Currency;
use App\Http\Resources\AbstractResource;
use Illuminate\Http\Request;

/**
 * The Currency resource class.
 *
 * This class transforms currency models into JSON responses for your API.
 *
 * @since x.x.x introduced
 */
class CurrencyResource extends AbstractResource
{
    /**
     * Create a new resource instance.
     *
     * @param Currency $resource
     *
     * @return void
     */
    public function __construct(Currency $resource)
    {
        parent::__construct($resource);
    }

    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     *
     * @return array
     */
    public function toArray($request): array
    {
        return parent::toArray($request);
    }
}
