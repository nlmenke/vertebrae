<?php
/**
 * Country API Controller.
 *
 * @package App\Http\Controllers\Api
 *
 * @author    Nick Menke <nick@nlmenke.net>
 * @copyright 2018-2020 Nick Menke
 *
 * @link https://github.com/nlmenke/vertebrae
 */

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Entities\Country\Country;
use App\Http\Resources\Country\CountryResource;

/**
 * The Country API controller class.
 *
 * This class allows a user to view, create, modify, or delete countries in the
 * application.
 *
 * @since x.x.x introduced
 */
class CountryApiController extends AbstractApiController
{
    /**
     * Relationships to be returned with the results.
     *
     * @var array
     */
    protected $with = [
        'index' => [
            'currency',
            'languages',
        ],
        'show' => [
            'currency',
            'languages',
        ],
    ];

    /**
     * Create a new API controller instance.
     *
     * @param Country         $model
     * @param CountryResource $resource
     *
     * @return void
     */
    public function __construct(Country $model, CountryResource $resource)
    {
        $this->model = $model;
        $this->resource = $resource;

        parent::__construct();
    }
}
