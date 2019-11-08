<?php
/**
 * Country Resource.
 *
 * @package App\Http\Resources\Country
 *
 * @author    Nick Menke <nick@nlmenke.net>
 * @copyright 2018-2019 Nick Menke
 *
 * @link https://github.com/nlmenke/vertebrae
 */

declare(strict_types=1);

namespace App\Http\Resources\Country;

use App\Entities\Country\Country;
use App\Http\Resources\AbstractResource;
use Illuminate\Http\Request;

/**
 * The Country resource class.
 *
 * This class transforms country models into JSON responses for your API.
 *
 * @since x.x.x introduced
 */
class CountryResource extends AbstractResource
{
    /**
     * Create a new resource instance.
     *
     * @param Country $resource
     *
     * @return void
     */
    public function __construct(Country $resource)
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
