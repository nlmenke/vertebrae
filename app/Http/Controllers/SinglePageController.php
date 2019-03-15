<?php namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

/**
 * Class SinglePageController
 *
 * @package App\Http\Controllers
 * @author  Nick Menke <nick@nlmenke.net>
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
