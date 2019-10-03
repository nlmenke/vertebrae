<?php declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\AbstractController;
use Illuminate\Foundation\Auth\ResetsPasswords;

/**
 * Class ResetPasswordController
 *
 * @package App\Http\Controllers\Auth
 * @author  Nick Menke <nick@nlmenke.net>
 */
class ResetPasswordController extends AbstractController
{
    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->middleware('guest');
    }
}
