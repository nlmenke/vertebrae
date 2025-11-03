<?php
/**
 * Password Validation Rules trait.
 *
 * @author Taylor Otwell <taylor@laravel.com>
 */

declare(strict_types=1);

namespace App\Actions\Fortify;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Validation\Rules;

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
     * @return array<int, Rules\Password|ValidationRule|list<Rules\Password|ValidationRule|string|null>|string|null>
     */
    protected function passwordRules(): array
    {
        return [
            'required',
            'string',
            Rules\Password::default(),
            'confirmed',
        ];
    }
}
