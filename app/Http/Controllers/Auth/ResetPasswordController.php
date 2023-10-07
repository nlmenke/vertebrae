<?php
/**
 * Auth/Password Reset Controller.
 *
 * @package App\Http\Controllers\Auth
 *
 * @author    Taylor Otwell <taylor@laravel.com>
 * @copyright 2018-2023 Nick Menke
 *
 * @link https://github.com/nlmenke/vertebrae
 */

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\AbstractController;
use Illuminate\Foundation\Auth\ResetsPasswords;

/**
 * Reset Password Controller.
 *
 * This controller is responsible for handling password reset requests
 * and uses a simple trait to include this behavior. You're free to
 * explore this trait and override any methods you wish to tweak.
 *
 * @since 0.0.0-framework introduced
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
