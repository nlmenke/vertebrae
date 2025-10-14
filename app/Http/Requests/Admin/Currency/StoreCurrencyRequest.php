<?php
/**
 * Store Currency form request.
 *
 * @author Nick Menke <git@nlmenke.net>
 */

declare(strict_types=1);

namespace App\Http\Requests\Admin\Currency;

use App\Http\Requests\AbstractFormRequest;
use App\Models\Currency;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;

/**
 * Handles validation for creating currency requests.
 *
 * @since 0.0.0-vertebrae introduced
 */
final class StoreCurrencyRequest extends AbstractFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return (bool) $this->user()?->can('create', Currency::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, Rules\Unique|ValidationRule|list<Rules\Unique|ValidationRule|string>|string>
     */
    public function rules(): array
    {
        return [
            'iso_alpha' => [
                'required',
                'string',
                'alpha',
                'min:3',
                'max:3',
                Rule::unique(Currency::class, 'iso_alpha')
                    ->withoutTrashed(),
            ],
            'iso_numeric' => [
                'required',
                'numeric',
                'digits:3',
                Rule::unique(Currency::class, 'iso_numeric')
                    ->withoutTrashed(),
            ],
            'name' => [
                'required',
                'string',
                'min:3',
                'max:255',
                Rule::unique(Currency::class, 'name')
                    ->withoutTrashed(),
            ],
            'symbol' => [
                'required',
                'string',
                'min:1',
                'max:4',
            ],
            'decimal_precision' => [
                'required',
                'numeric',
            ],
            'exchange_rate' => [
                'required',
                'numeric',
            ],
        ];
    }
}
