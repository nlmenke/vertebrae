<?php
/**
 * Password Validation Rules trait.
 *
 * @author Taylor Otwell <taylor@laravel.com>
 */

declare(strict_types=1);

namespace App\Actions\Fortify;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Validation\Rules\Password;

/**
 * Handles setting the password validation rules.
 *
 * @since 0.0.0-framework introduced
 */
trait PasswordValidationRules
{
    /**
     * Get the validation rules used to validate passwords.
     *
     * @return array<int, Password|ValidationRule|string>
     */
    protected function passwordRules(): array
    {
        return [
            'required',
            'string',
            Password::default(),
            'confirmed',
        ];
    }
}
