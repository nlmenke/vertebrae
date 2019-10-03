<?php declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

/**
 * Class DashboardController
 *
 * @package App\Http\Controllers
 * @author  Nick Menke <nick@nlmenke.net>
 */
class DashboardController extends AbstractController
{
    /**
     * Show the application dashboard.
     *
     * @return Factory|View
     */
    public function index()
    {
        return view('welcome');
    }
}
