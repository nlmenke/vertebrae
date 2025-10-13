<?php
/**
 * Update Profile form request.
 *
 * @author Taylor Otwell <taylor@laravel.com>
 */

declare(strict_types=1);

namespace App\Http\Requests\Settings;

use App\Http\Requests\AbstractFormRequest;
use App\Models\User;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;

/**
 * Handles validation for user profile update requests.
 *
 * @since 0.0.0-framework introduced
 * @since 0.0.0-vertebrae renamed to UpdateProfileRequest
 */
final class UpdateProfileRequest extends AbstractFormRequest
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
     * @return array<string, Rules\Unique|ValidationRule|list<Rules\Unique|ValidationRule|string>|string>
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:255',
            ],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique(User::class)
                    ->ignore($this->user()?->id),
            ],
        ];
    }
}
