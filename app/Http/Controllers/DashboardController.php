<?php
/**
 * Dashboard Controller.
 *
 * @package App\Http\Controllers
 *
 * @author    Nick Menke <nick@nlmenke.net>
 * @copyright 2018-2019 Nick Menke
 *
 * @link https://github.com/nlmenke/vertebrae
 */

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

/**
 * The Dashboard controller class.
 *
 * This class contains all functionality required to view the homepage.
 *
 * @since x.x.x introduced
 */
class DashboardController extends AbstractController
{
    /**
     * Shows the application dashboard.
     *
     * Load any data required to properly display the homepage.
     *
     * @return Factory|View
     */
    public function index()
    {
        return view('welcome');
    }
}
