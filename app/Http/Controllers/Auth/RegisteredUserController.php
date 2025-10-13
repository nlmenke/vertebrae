<?php
/**
 * Registered User controller.
 *
 * @author Taylor Otwell <taylor@laravel.com>
 */

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\AbstractController;
use App\Http\Requests\Auth\StoreRegisteredUserRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;
use Inertia\Response;

/**
 * Handles user registration.
 *
 * @since 0.0.0-framework introduced
 */
final class RegisteredUserController extends AbstractController
{
    /**
     * Show the registration page.
     */
    public function create(): Response
    {
        return Inertia::render('auth/Register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
    public function store(StoreRegisteredUserRequest $request): RedirectResponse
    {
        $user = User::query()
            ->create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->string('password')->toString()),
            ]);

        event(new Registered($user));

        Auth::login($user);

        $request->session()->regenerate();

        return to_route('dashboard');
    }
}
