<?php
/**
 * Email Verification controller.
 *
 * @author Taylor Otwell <taylor@laravel.com>
 */

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\AbstractController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;

/**
 * Handles verifying user email addresses when they click on verification links
 * sent via email.
 *
 * @since 0.0.0-framework introduced
 */
final class VerifyEmailController extends AbstractController
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        if ($request->user()?->hasVerifiedEmail()) {
            return redirect()->intended(route('dashboard', [
                'verified' => true,
            ], false));
        }

        $request->fulfill();

        return redirect()->intended(route('dashboard', [
            'verified' => true,
        ], false));
    }
}
