<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\AbstractController;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

/**
 * Class ForgotPasswordController
 *
 * @package App\Http\Controllers\Auth
 * @author  Nick Menke <nick@nlmenke.net>
 */
class ForgotPasswordController extends AbstractController
{
    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
}
