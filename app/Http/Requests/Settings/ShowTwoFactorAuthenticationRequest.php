<?php
/**
 * Show Two-Factor Authentication request.
 *
 * @author Taylor Otwell <taylor@laravel.com>
 */

declare(strict_types=1);

namespace App\Http\Requests\Settings;

use App\Http\Requests\AbstractFormRequest;
use Illuminate\Contracts\Validation\ValidationRule;
use Laravel\Fortify\Features;
use Laravel\Fortify\InteractsWithTwoFactorState;

/**
 * Handles validation for showing two-factor authentication requests.
 *
 * @since 0.0.0-framework introduced
 * @since 0.0.0-vertebrae renamed to ShowTwoFactorAuthenticationRequest
 */
final class ShowTwoFactorAuthenticationRequest extends AbstractFormRequest
{
    use InteractsWithTwoFactorState;

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Features::enabled(Features::twoFactorAuthentication());
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|list<ValidationRule|string>|string>
     */
    public function rules(): array
    {
        return [];
    }
}
