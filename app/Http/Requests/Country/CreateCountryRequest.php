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
            'currency_id' => 'integer',
            'iso_alpha_2' => 'required|size:2|unique:countries',
            'iso_alpha_3' => 'required|size:3|unique:countries',
            'iso_numeric' => 'required|size:3|unique:countries',
            'name' => 'required',
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
