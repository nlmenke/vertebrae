<?php declare(strict_types=1);
/**
 * Home Controller.
 *
 * @package   App\Http\Controllers
 * @author    Taylor Otwell <taylor@laravel.com>
 * @author    Nick Menke <nick@nlmenke.net>
 * @copyright 2018-2019 Nick Menke
 * @link      https://github.com/nlmenke/vertebrae
 */

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;

/**
 * The Home controller class.
 *
 * This class contains all functionality required to load the authenticated
 * homepage - a dashboard only accessible when logged in.
 *
 * @since 0.0.0-framework introduced
 * @since x.x.x           modified to extend AbstractController
 */
class HomeController extends AbstractController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->middleware('auth');
    }

    /**
     * Shows the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        return view('home');
    }
}
