<?php namespace App\Http\Controllers\Api;

use App\Entities\Currency\Currency;
use App\Http\Resources\Currency\CurrencyResource;

/**
 * Class CurrencyController
 *
 * @package App\Http\Controllers\Api
 * @author  Nick Menke <nick@nlmenke.net>
 */
class CurrencyApiController extends AbstractApiController
{
    /**
     * Relationships to be returned with the results.
     *
     * @var array
     */
    protected $with = [
        'index' => [
            'countries',
        ],
        'show' => [
            'countries',
        ],
    ];

    /**
     * Create a new controller instance.
     *
     * @param Currency         $model
     * @param CurrencyResource $resource
     * @return void
     */
    public function __construct(Currency $model, CurrencyResource $resource)
    {
        $this->model = $model;
        $this->resource = $resource;

        parent::__construct();
    }
}
