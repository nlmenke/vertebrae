<?php
/**
 * Store Role form request.
 *
 * @author Nick Menke <git@nlmenke.net>
 */

declare(strict_types=1);

namespace App\Http\Requests\Admin\Role;

use App\Http\Requests\AbstractFormRequest;
use App\Models\Role;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;

/**
 * Handles validation for creating role requests.
 *
 * @since 0.0.0-vertebrae introduced
 */
final class StoreRoleRequest extends AbstractFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return (bool) $this->user()?->can('create', Role::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, Rules\Unique|ValidationRule|list<Rules\Unique|ValidationRule|string>|string>
     */
    public function rules(): array
    {
        return [
            'slug' => [
                'required',
                'string',
                'lowercase',
                'alpha_dash:ascii',
                Rule::unique(Role::class, 'slug'),
            ],
            'name' => [
                'required',
                'string',
                Rule::unique(Role::class, 'name'),
            ],
            'description' => [
                'nullable',
                'string',
            ],
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        if ($this->isNotFilled('slug') && $this->filled('name')) {
            $this->merge([
                'slug' => Str::slug($this->string('name')->toString()),
            ]);
        }
    }
}
