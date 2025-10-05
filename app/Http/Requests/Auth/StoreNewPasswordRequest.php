<?php
/**
 * Store New Password request.
 *
 * @author Nick Menke <git@nlmenke.net>
 */

declare(strict_types=1);

namespace App\Http\Requests\Auth;

use App\Http\Requests\AbstractFormRequest;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Validation\Rules;

/**
 * Handles validation for new password requests.
 *
 * @since 0.0.0-vertebrae introduced
 */
final class StoreNewPasswordRequest extends AbstractFormRequest
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
     * @return array<string, Rules\Password|ValidationRule|list<Rules\Password|ValidationRule|string|null>|string|null>
     */
    public function rules(): array
    {
        return [
            'token' => [
                'required',
            ],
            'email' => [
                'required',
                'email',
            ],
            'password' => [
                'required',
                'confirmed',
                Rules\Password::defaults(),
            ],
        ];
    }
}
