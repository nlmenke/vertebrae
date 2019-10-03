<?php declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Entities\Language\Language;
use App\Http\Resources\Language\LanguageResource;

/**
 * Class LanguageApiController
 *
 * @package App\Http\Controllers\Api
 * @author  Nick Menke <nick@nlmenke.net>
 */
class LanguageApiController extends AbstractApiController
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
     * @param Language         $model
     * @param LanguageResource $resource
     * @return void
     */
    public function __construct(Language $model, LanguageResource $resource)
    {
        $this->model = $model;
        $this->resource = $resource;

        parent::__construct();
    }
}
