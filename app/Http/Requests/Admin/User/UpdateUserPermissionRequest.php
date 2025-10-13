<?php
/**
 * Update User Permission form request.
 *
 * @author Nick Menke <git@nlmenke.net>
 */

declare(strict_types=1);

namespace App\Http\Requests\Admin\User;

use App\Http\Requests\AbstractFormRequest;
use Illuminate\Contracts\Validation\ValidationRule;

/**
 * Handles validation for updating user permission requests.
 *
 * @since 0.0.0-vertebrae introduced
 */
final class UpdateUserPermissionRequest extends AbstractFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return (bool) $this->user()?->can('update-permissions', $this->route('user'));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|list<ValidationRule|string>|string>
     */
    public function rules(): array
    {
        return [
            'permissions' => [
                'array',
            ],
            'permissions.*.id' => [
                'required',
                'integer',
            ],
            'permissions.*.checked' => [
                'required',
                'accepted',
            ],
        ];
    }
}
