<?php
/**
 * Password controller.
 *
 * @author Taylor Otwell <taylor@laravel.com>
 */

declare(strict_types=1);

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\AbstractController;
use App\Http\Requests\Settings\UpdatePasswordRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;
use Inertia\Response;

/**
 * Handles updating user passwords.
 *
 * @since 0.0.0-framework introduced
 */
final class PasswordController extends AbstractController
{
    /**
     * Show the user's password settings page.
     */
    public function edit(): Response
    {
        return Inertia::render('settings/Password');
    }

    /**
     * Update the user's password.
     */
    public function update(UpdatePasswordRequest $request): RedirectResponse
    {
        /** @var array<string, string> $validated */
        $validated = $request->validated();

        $request->user()?->update([
            'password' => Hash::make($validated['password']),
        ]);

        return back();
    }
}
