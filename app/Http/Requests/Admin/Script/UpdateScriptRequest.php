<?php
/**
 * Update Script form request.
 *
 * @author Nick Menke <git@nlmenke.net>
 */

declare(strict_types=1);

namespace App\Http\Requests\Admin\Script;

use App\Enums\ScriptDirection;
use App\Http\Requests\AbstractFormRequest;
use App\Models\Script;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;

/**
 * Handles validation for updating script requests.
 *
 * @since 0.0.0-vertebrae introduced
 */
final class UpdateScriptRequest extends AbstractFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return (bool) $this->user()?->can('update', $this->route('script'));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, Rules\Enum|Rules\Unique|ValidationRule|list<Rules\Enum|Rules\Unique|ValidationRule|string>|string>
     */
    public function rules(): array
    {
        return [
            'iso_alpha' => [
                'required',
                'string',
                'alpha',
                'min:4',
                'max:4',
                Rule::unique(Script::class, 'iso_alpha')
                    ->ignore($this->route('script'))
                    ->withoutTrashed(),
            ],
            'iso_numeric' => [
                'required',
                'numeric',
                'digits:3',
                Rule::unique(Script::class, 'iso_numeric')
                    ->ignore($this->route('script'))
                    ->withoutTrashed(),
            ],
            'name' => [
                'required',
                'string',
                'min:3',
                'max:255',
                Rule::unique(Script::class, 'name')
                    ->ignore($this->route('script'))
                    ->withoutTrashed(),
            ],
            'direction' => [
                'required',
                Rule::Enum(ScriptDirection::class),
            ],
        ];
    }
}
