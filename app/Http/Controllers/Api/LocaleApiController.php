<?php
/**
 * Locale API Controller.
 *
 * @package App\Http\Controllers\Api
 *
 * @author    Nick Menke <nick@nlmenke.net>
 * @copyright 2018-2023 Nick Menke
 *
 * @link https://github.com/nlmenke/vertebrae
 */

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Entities\Locale\Locale;
use App\Http\Resources\Locale\LocaleResource;

/**
 * The Locale API controller class.
 *
 * This class allows a user to view, create, modify, or delete locales in the
 * application.
 *
 * @since x.x.x introduced
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
     *
     * @return void
     */
    public function __construct(Locale $model, LocaleResource $resource)
    {
        $this->model = $model;
        $this->resource = $resource;

        parent::__construct();
    }
}
