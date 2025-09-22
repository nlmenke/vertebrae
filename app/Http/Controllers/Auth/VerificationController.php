<?php

/**
 * Auth/Verification Controller.
 *
 * @package App\Http\Controllers\Auth
 *
 * @author    Taylor Otwell <taylor@laravel.com>
 * @copyright 2018-2020 Nick Menke
 *
 * @link https://github.com/nlmenke/vertebrae
 */

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\AbstractController;
use Illuminate\Foundation\Auth\VerifiesEmails;

/**
 * Email Verification Controller.
 *
 * This controller is responsible for handling email verification for any
 * user that recently registered with the application. Emails may also
 * be resent if the user didn't receive the original email message.
 *
 * @since 0.0.0-framework introduced
 */
class VerificationController extends AbstractController
{
    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
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

        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }
}
