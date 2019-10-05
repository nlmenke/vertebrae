<?php declare(strict_types=1);
/**
 * Currency API Controller.
 *
 * @package   App\Http\Controllers\Api
 * @author    Nick Menke <nick@nlmenke.net>
 * @copyright 2018-2019 Nick Menke
 * @link      https://github.com/nlmenke/vertebrae
 */

namespace App\Http\Controllers\Api;

use App\Entities\Currency\Currency;
use App\Http\Resources\Currency\CurrencyResource;

/**
 * The Currency API controller class.
 *
 * This class allows a user to view, create, modify, or delete currencies in
 * the application.
 *
 * @since x.x.x introduced
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
