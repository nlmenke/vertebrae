<?php
/**
 * Abstract controller.
 *
 * @author Taylor Otwell <taylor@laravel.com>
 * @author Nick Menke <git@nlmenke.net>
 */

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\AbstractModel;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

/**
 * Base controller that all other controllers extend.
 *
 * @since 0.0.0-framework introduced
 * @since 0.0.0-vertebrae renamed to AbstractController with added abstraction
 */
abstract class AbstractController
{
    use AuthorizesRequests;
    use ValidatesRequests;

    /**
     * The model instance.
     *
     * @since 0.0.0-vertebrae introduced
     */
    protected AbstractModel $model;

    /**
     * The number of results to return per page.
     *
     * @since 0.0.0-vertebrae introduced
     */
    protected int $perPage;

    /**
     * The order in which the results should be displayed.
     *
     * @since 0.0.0-vertebrae introduced
     *
     * @var array<string, list<string>>
     */
    protected array $sorting;

    /**
     * Relationships to be returned with the results.
     *
     * @since 0.0.0-vertebrae introduced
     *
     * @var array<string, list<string>>
     */
    protected array $with = [];

    /**
     * Creates a new controller instance.
     *
     * @since 0.0.0-vertebrae introduced
     */
    public function __construct(Request $request)
    {
        $sortRequest = $request->string('sort', 'id')->toString();
        $sortRequest = explode(',', $sortRequest);

        $columns = [];
        $directions = [];
        foreach ($sortRequest as $sort) {
            $columns[] = mb_ltrim($sort, '-');
            $directions[] = Str::startsWith($sort, '-') ? 'desc' : 'asc';
        }

        $this->sorting = [
            'columns' => $columns,
            'directions' => $directions,
        ];

        $this->perPage = $request->integer('count', 50);
    }
}
