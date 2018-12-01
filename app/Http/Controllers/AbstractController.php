<?php namespace App\Http\Controllers;

use App\Entities\AbstractEntity;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;

/**
 * Class AbstractController
 *
 * @package App\Http\Controllers
 * @author  Nick Menke <nick@nlmenke.net>
 */
abstract class AbstractController extends Controller
{
    use AuthorizesRequests,
        DispatchesJobs,
        ValidatesRequests;

    /**
     * The base route name used by the controller.
     *
     * @var string
     */
    protected $baseRouteName;

    /**
     * The entity instance.
     *
     * @var AbstractEntity|EloquentBuilder
     */
    protected $model;

    /**
     * The number of results to show per page.
     *
     * @var int
     */
    protected $perPage;

    /**
     * The order of the results.
     *
     * @var array
     */
    protected $sorting;

    /**
     * Relationships to be returned with the results.
     *
     * @var array
     */
    protected $with = [];

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->baseRouteName = str_replace(['index', 'show', 'store', 'update', 'destroy'], '', \Request::route()->getName());

        $this->perPage = (int)\Request::get('count', 10);

        $sortRequest = \Request::get('sorting', ['id' => 'asc']);
        $this->sorting = [
            'column' => array_keys($sortRequest)[0],
            'direction' => array_values($sortRequest)[0],
        ];
    }
}
