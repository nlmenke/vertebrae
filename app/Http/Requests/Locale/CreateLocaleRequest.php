<?php declare(strict_types=1);
/**
 * Create Locale Request.
 *
 * @package   App\Http\Requests\Locale
 * @author    Nick Menke <nick@nlmenke.net>
 * @copyright 2018-2019 Nick Menke
 * @link      https://github.com/nlmenke/vertebrae
 */

namespace App\Http\Requests\Locale;

use App\Http\Requests\AbstractFormRequest;

/**
 * The Create Locale form request class.
 *
 * This class handles form validation for creation of a new locale. It also
 * permits (or denies) a user access to create a locale.
 *
 * @since x.x.x introduced
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
