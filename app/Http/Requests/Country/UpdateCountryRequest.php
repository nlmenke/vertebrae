<?php
/**
 * Update Country Request.
 *
 * @package App\Http\Requests\Country
 *
 * @author    Nick Menke <nick@nlmenke.net>
 * @copyright 2018-2020 Nick Menke
 *
 * @link https://github.com/nlmenke/vertebrae
 */

declare(strict_types=1);

namespace App\Http\Requests\Country;

use App\Http\Requests\AbstractFormRequest;

/**
 * The Update Country form request class.
 *
 * This class handles form validation for modifying of a new country. It also
 * permits (or denies) a user access to modify a country.
 *
 * @since x.x.x introduced
 */
class UpdateCountryRequest extends AbstractFormRequest
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
            'currency_id' => 'integer|nullable',
            'iso_alpha_2' => 'required|string|size:2|unique:countries,iso_alpha_2,' . $this->route('country') . ',id,deleted_at,NULL',
            'iso_alpha_3' => 'required|string|size:3|unique:countries,iso_alpha_3,' . $this->route('country') . ',id,deleted_at,NULL',
            'iso_numeric' => 'required|string|size:3|unique:countries,iso_numeric,' . $this->route('country') . ',id,deleted_at,NULL',
            'name' => 'required|string',
        ];
    }
}
