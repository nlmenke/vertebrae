<?php
/**
 * Store Locale form request.
 *
 * @author Nick Menke <git@nlmenke.net>
 */

declare(strict_types=1);

namespace App\Http\Requests\Admin\Locale;

use App\Http\Requests\AbstractFormRequest;
use App\Models\Country;
use App\Models\Language;
use App\Models\Locale;
use App\Models\Script;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;

/**
 * Handles validation for creating locale requests.
 *
 * @since 0.0.0-vertebrae introduced
 */
final class StoreLocaleRequest extends AbstractFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return (bool) $this->user()?->can('create', Locale::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, Rules\Exists|Rules\Unique|ValidationRule|list<Rules\Exists|Rules\Unique|ValidationRule|string>|string>
     */
    public function rules(): array
    {
        return [
            'language_id' => [
                'required',
                'integer',
                Rule::exists(Language::class, 'id'),
            ],
            'country_id' => [
                'nullable',
                'integer',
                Rule::exists(Country::class, 'id'),
            ],
            'script_id' => [
                'required',
                'integer',
                Rule::exists(Script::class, 'id'),
            ],
            'code' => [
                'required',
                'string',
                'min:2',
                'max:35',
                Rule::unique(Locale::class, 'code')
                    ->withoutTrashed(),
            ],
            'native' => [
                'required',
                'string',
                'min:2',
                'max:255',
            ],
            'currency_symbol_first' => [
                'boolean',
            ],
            'decimal_mark' => [
                'required',
                'string',
                'min:1',
                'max:255',
            ],
            'thousands_separator' => [
                'required',
                'string',
                'min:1',
                'max:255',
            ],
            'active' => [
                'boolean',
            ],
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'currency_symbol_first' => $this->boolean('currency_symbol_first'),
            'active' => $this->boolean('active'),
        ]);
    }
}
