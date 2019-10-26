<?php
/**
 * Update Locale Request.
 *
 * @package App\Http\Requests\Locale
 *
 * @author    Nick Menke <nick@nlmenke.net>
 * @copyright 2018-2019 Nick Menke
 *
 * @link https://github.com/nlmenke/vertebrae
 */

declare(strict_types=1);

namespace App\Http\Requests\Locale;

use App\Http\Requests\AbstractFormRequest;

/**
 * The Update Locale form request class.
 *
 * This class handles form validation for modifying of a new locale. It also
 * permits (or denies) a user access to modify a locale.
 *
 * @since x.x.x introduced
 */
class UpdateLocaleRequest extends AbstractFormRequest
{
    /**
     * Does the current user have access?
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

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
            'code' => 'required|string|max:11|unique:locales,code,' . $this->route('locale') . ',id,deleted_at,NULL',
            'native' => 'required|string',
            'currency_symbol_first' => 'boolean',
        ];
    }
}
