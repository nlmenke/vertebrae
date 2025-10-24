<?php
/**
 * Store Country form request.
 *
 * @author Nick Menke <git@nlmenke.net>
 */

declare(strict_types=1);

namespace App\Http\Requests\Admin\Country;

use App\Http\Requests\AbstractFormRequest;
use App\Models\Country;
use App\Models\Currency;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;

/**
 * Handles validation for creating country requests.
 *
 * @since 0.0.0-vertebrae introduced
 */
final class StoreCountryRequest extends AbstractFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return (bool) $this->user()?->can('create', Country::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, Rules\Exists|Rules\Unique|ValidationRule|list<Rules\Exists|Rules\Unique|ValidationRule|string>|string>
     */
    public function rules(): array
    {
        return [
            'currency_id' => [
                'nullable',
                'integer',
                Rule::exists(Currency::class, 'id'),
            ],
            'iso_alpha_2' => [
                'required',
                'string',
                'alpha',
                'min:2',
                'max:2',
                Rule::unique(Country::class, 'iso_alpha_2')
                    ->withoutTrashed(),
            ],
            'iso_alpha_3' => [
                'required',
                'string',
                'alpha',
                'min:3',
                'max:3',
                Rule::unique(Country::class, 'iso_alpha_3')
                    ->withoutTrashed(),
            ],
            'iso_numeric' => [
                'required',
                'numeric',
                'digits:3',
                Rule::unique(Country::class, 'iso_numeric')
                    ->withoutTrashed(),
            ],
            'name' => [
                'required',
                'string',
                'min:3',
                'max:255',
                Rule::unique(Country::class, 'name')
                    ->withoutTrashed(),
            ],
        ];
    }
}
