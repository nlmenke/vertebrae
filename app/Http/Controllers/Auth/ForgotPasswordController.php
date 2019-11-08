<?php
/**
 * Auth/Forgot Password Controller.
 *
 * @package App\Http\Controllers\Auth
 *
 * @author    Taylor Otwell <taylor@laravel.com>
 * @copyright 2018-2019 Nick Menke
 *
 * @link https://github.com/nlmenke/vertebrae
 */

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\AbstractController;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

/**
 * Password Reset Controller.
 *
 * This controller is responsible for handling password reset emails and
 * includes a trait which assists in sending these notifications from
 * your application to your users. Feel free to explore this trait.
 *
 * @since 0.0.0-framework introduced
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
        parent::__construct();

        $this->middleware('guest');
    }
}
