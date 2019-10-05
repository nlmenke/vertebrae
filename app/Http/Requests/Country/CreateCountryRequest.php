<?php declare(strict_types=1);
/**
 * Create Country Request.
 *
 * @package   App\Http\Requests\Country
 * @author    Nick Menke <nick@nlmenke.net>
 * @copyright 2018-2019 Nick Menke
 * @link      https://github.com/nlmenke/vertebrae
 */

namespace App\Http\Requests\Country;

use App\Http\Requests\AbstractFormRequest;

/**
 * The Create Country form request class.
 *
 * This class handles form validation for creation of a new country. It also
 * permits (or denies) a user access to create a country.
 *
 * @since x.x.x introduced
 */
class CreateCountryRequest extends AbstractFormRequest
{
    /**
     * The authorization rules.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'currency_id' => 'integer|nullable',
            'iso_alpha_2' => 'required|string|size:2|unique:countries',
            'iso_alpha_3' => 'required|string|size:3|unique:countries',
            'iso_numeric' => 'required|string|size:3|unique:countries',
            'name' => 'required|string',
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
