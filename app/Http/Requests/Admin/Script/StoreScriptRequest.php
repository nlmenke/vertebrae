<?php
/**
 * Store Script form request.
 *
 * @author Nick Menke <git@nlmenke.net>
 */

declare(strict_types=1);

namespace App\Http\Requests\Admin\Script;

use App\Http\Requests\AbstractFormRequest;
use App\Models\Script;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;

/**
 * Handles validation for creating script requests.
 *
 * @since 0.0.0-vertebrae introduced
 */
final class StoreScriptRequest extends AbstractFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return (bool) $this->user()?->can('create', Script::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, Rules\In|Rules\Unique|ValidationRule|list<Rules\In|Rules\Unique|ValidationRule|string>|string>
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
                    ->withoutTrashed(),
            ],
            'iso_numeric' => [
                'required',
                'numeric',
                'digits:3',
                Rule::unique(Script::class, 'iso_numeric')
                    ->withoutTrashed(),
            ],
            'name' => [
                'required',
                'string',
                'min:3',
                'max:255',
                Rule::unique(Script::class, 'name')
                    ->withoutTrashed(),
            ],
            'direction' => [
                'required',
                'string',
                Rule::in([
                    'ltr',
                    'rtl',
                    'ttb',
                    'varies',
                ]),
            ],
        ];
    }
}
