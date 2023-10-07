<?php
/**
 * Single-Page Controller.
 *
 * @package App\Http\Controllers
 *
 * @author    Nick Menke <nick@nlmenke.net>
 * @copyright 2018-2023 Nick Menke
 *
 * @link https://github.com/nlmenke/vertebrae
 */

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

/**
 * The single-page controller class.
 *
 * This class loads the view that loads the JavaScript front-end.
 *
 * @since x.x.x introduced
 */
class SinglePageController extends AbstractController
{
    /**
     * Load the Vue application view.
     *
     * @return Factory|View
     */
    public function index()
    {
        return view('layouts/single-page');
    }
}
