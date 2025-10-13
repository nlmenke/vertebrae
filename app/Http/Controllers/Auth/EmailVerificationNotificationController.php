<?php
/**
 * Email Verification Notification controller.
 *
 * @author Taylor Otwell <taylor@laravel.com>
 */

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\AbstractController;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

/**
 * Handles sending email verification notifications to users who have not yet
 * verified their email addresses.
 *
 * @since 0.0.0-framework introduced
 */
final class EmailVerificationNotificationController extends AbstractController
{
    /**
     * Send a new email verification notification.
     */
    public function store(Request $request): RedirectResponse
    {
        if ($request->user()?->hasVerifiedEmail()) {
            return redirect()->intended(route('dashboard', absolute: false));
        }

        $request->user()?->sendEmailVerificationNotification();

        return back()->with('status', 'verification-link-sent');
    }
}
