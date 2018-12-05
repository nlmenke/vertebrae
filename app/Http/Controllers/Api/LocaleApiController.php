<?php namespace App\Http\Controllers\Api;

use App\Entities\Locale\Locale;
use App\Http\Resources\Locale\LocaleResource;

/**
 * Class LocaleApiController
 *
 * @package App\Http\Controllers\Api
 * @author  Nick Menke <nick@nlmenke.net>
 */
class LocaleApiController extends AbstractApiController
{
    /**
     * Relationships to be returned with the results.
     *
     * @var array
     */
    protected $with = [
        'index' => [
            'country',
            'language',
            'script',
        ],
        'show' => [
            'country',
            'language',
            'script',
        ],
    ];

    /**
     * Create a new controller instance.
     *
     * @param Locale         $model
     * @param LocaleResource $resource
     * @return void
     */
    public function __construct(Locale $model, LocaleResource $resource)
    {
        $this->model = $model;
        $this->resource = $resource;

        parent::__construct();
    }
}
