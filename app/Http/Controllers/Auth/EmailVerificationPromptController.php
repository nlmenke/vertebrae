<?php
/**
 * Email Verification Prompt controller.
 *
 * @author Taylor Otwell <taylor@laravel.com>
 */

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\AbstractController;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

/**
 * Handles displaying the email verification prompt page to users who have not
 * yet verified their email addresses.
 *
 * @since 0.0.0-framework introduced
 */
final class EmailVerificationPromptController extends AbstractController
{
    /**
     * Show the email verification prompt page.
     */
    public function __invoke(Request $request): RedirectResponse|Response
    {
        return $request->user()?->hasVerifiedEmail()
            ? redirect()->intended(route('dashboard', absolute: false))
            : Inertia::render('auth/VerifyEmail', [
                'status' => $request->session()->get('status'),
            ]);
    }
}
