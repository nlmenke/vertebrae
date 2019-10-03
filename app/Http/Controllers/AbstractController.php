<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Entities\AbstractEntity;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;
use Request;

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
     * The current locale.
     *
     * @var string
     */
    protected $currentLocale;

    /**
     * The entity instance.
     *
     * @var AbstractEntity|EloquentBuilder
     */
    protected $model;

    /**
     * The number of results per page.
     *
     * @var int
     */
    protected $perPage;

    /**
     * The order the results displayed.
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
     * Creates a new controller instance.
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
