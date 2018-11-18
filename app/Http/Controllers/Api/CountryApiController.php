<?php namespace App\Http\Controllers\Api;

use App\Entities\Country\Country;
use App\Http\Resources\Country\CountryResource;

/**
 * Class CountryController
 *
 * @package App\Http\Controllers\Api
 * @author  Nick Menke <nick@nlmenke.net>
 */
class CountryApiController extends AbstractApiController
{
    /**
     * Create a new controller instance.
     *
     * @param Country         $model
     * @param CountryResource $resource
     * @return void
     */
    public function __construct(Country $model, CountryResource $resource)
    {
        $this->model = $model;
        $this->resource = $resource;

        parent::__construct();
    }
}
