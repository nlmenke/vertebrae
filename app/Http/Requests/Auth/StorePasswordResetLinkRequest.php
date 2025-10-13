<?php
/**
 * Store Password Reset Link form request.
 *
 * @author Taylor Otwell <taylor@laravel.com>
 * @author Nick Menke <git@nlmenke.net>
 */

declare(strict_types=1);

namespace App\Http\Requests\Auth;

use App\Http\Requests\AbstractFormRequest;
use Illuminate\Contracts\Validation\ValidationRule;

/**
 * Handles validation for password-reset link requests.
 *
 * @since 0.0.0-framework introduced
 * @since 0.0.0-vertebrae moved validation to class
 */
final class StorePasswordResetLinkRequest extends AbstractFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|list<string>|string>
     */
    public function rules(): array
    {
        return [
            'email' => [
                'required',
                'email',
            ],
        ];
    }
}
