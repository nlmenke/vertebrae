<?php
/**
 * Update Language form request.
 *
 * @author Nick Menke <git@nlmenke.net>
 */

declare(strict_types=1);

namespace App\Http\Requests\Admin\Language;

use App\Http\Requests\AbstractFormRequest;
use App\Models\Language;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;

/**
 * Handles validation for updating language requests.
 *
 * @since 0.0.0-vertebrae introduced
 */
final class UpdateLanguageRequest extends AbstractFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return (bool) $this->user()?->can('update', $this->route('language'));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, Rules\Unique|ValidationRule|list<Rules\Unique|ValidationRule|string>|string>
     */
    public function rules(): array
    {
        return [
            'iso_alpha_2' => [
                'required',
                'string',
                'alpha',
                'min:2',
                'max:2',
                Rule::unique(Language::class, 'iso_alpha_2')
                    ->ignore($this->route('language'))
                    ->withoutTrashed(),
            ],
            'iso_alpha_3' => [
                'required',
                'string',
                'alpha',
                'min:3',
                'max:3',
                Rule::unique(Language::class, 'iso_alpha_3')
                    ->ignore($this->route('language'))
                    ->withoutTrashed(),
            ],
            'name' => [
                'required',
                'string',
                'min:3',
                'max:255',
                Rule::unique(Language::class, 'name')
                    ->ignore($this->route('language'))
                    ->withoutTrashed(),
            ],
        ];
    }
}
