<?php namespace App\Http\Requests\Country;

use App\Http\Requests\AbstractFormRequest;

/**
 * Class CreateCountryRequest
 *
 * @package App\Http\Requests\Country
 * @author  Nick Menke <nick@nlmenke.net>
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
