<?php declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\AbstractController;
use Illuminate\Foundation\Auth\VerifiesEmails;

/**
 * Class VerificationController
 *
 * @package App\Http\Controllers\Auth
 * @author  Nick Menke <nick@nlmenke.net>
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
