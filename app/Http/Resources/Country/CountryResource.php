<?php declare(strict_types=1);

namespace App\Http\Resources\Country;

use App\Entities\Country\Country;
use App\Http\Resources\AbstractResource;
use Illuminate\Http\Request;

/**
 * Class CountryResource
 *
 * @package App\Http\Resources\Country
 * @author  Nick Menke <nick@nlmenke.net>
 */
class CountryResource extends AbstractResource
{
    /**
     * Create a new resource instance.
     *
     * @param Country $resource
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
     * @return array
     */
    public function toArray($request): array
    {
        return parent::toArray($request);
    }
}
