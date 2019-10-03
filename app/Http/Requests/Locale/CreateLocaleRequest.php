<?php declare(strict_types=1);

namespace App\Http\Requests\Locale;

use App\Http\Requests\AbstractFormRequest;

/**
 * Class CreateLocaleRequest
 *
 * @package App\Http\Requests\Locale
 * @author  Nick Menke <nick@nlmenke.net>
 */
class CreateLocaleRequest extends AbstractFormRequest
{
    /**
     * The authorization rules.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'country_id' => 'integer|nullable',
            'language_id' => 'required|integer',
            'script_id' => 'required|integer',
            'code' => 'required|string|max:11|unique:locales',
            'native' => 'required|string',
            'currency_symbol_first' => 'boolean',
        ];
    }

    /**
     * Does the current user have access?
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }
}
