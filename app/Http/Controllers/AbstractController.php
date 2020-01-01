<?php
/**
 * Abstract Controller.
 *
 * @package App\Http\Controllers
 *
 * @author    Taylor Otwell <taylor@laravel.com>
 * @author    Nick Menke <nick@nlmenke.net>
 * @copyright 2018-2020 Nick Menke
 *
 * @link https://github.com/nlmenke/vertebrae
 */

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Entities\AbstractEntity;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;
use Request;

/**
 * The base controller class.
 *
 * This class contains any functionality that would otherwise be duplicated in
 * other controllers. All other controllers should extend this class.
 *
 * @since 0.0.0-framework introduced
 * @since x.x.x           renamed to AbstractController and added abstraction
 */
abstract class AbstractController extends Controller
{
    use AuthorizesRequests,
        DispatchesJobs,
        ValidatesRequests;

    /**
     * The current locale.
     *
     * @since x.x.x introduced
     *
     * @var string
     */
    protected $currentLocale;

    /**
     * The entity instance.
     *
     * @since x.x.x introduced
     *
     * @var AbstractEntity|EloquentBuilder
     */
    protected $model;

    /**
     * The number of results per page.
     *
     * @since x.x.x introduced
     *
     * @var int
     */
    protected $perPage;

    /**
     * The order the results displayed.
     *
     * @since x.x.x introduced
     *
     * @var array
     */
    protected $sorting;

    /**
     * Relationships to be returned with the results.
     *
     * @since x.x.x introduced
     *
     * @var array
     */
    protected $with = [];

    /**
     * Creates a new controller instance.
     *
     * @since x.x.x introduced
     *
     * @return void
     */
    public function __construct()
    {
        $this->currentLocale = app()->getLocale();

        $this->perPage = (int)Request::get('count', 10);

        $sortRequest = Request::get('sorting', ['id' => 'asc']);
        $this->sorting = [
            'column' => array_keys($sortRequest)[0],
            'direction' => array_values($sortRequest)[0],
        ];
    }
}
