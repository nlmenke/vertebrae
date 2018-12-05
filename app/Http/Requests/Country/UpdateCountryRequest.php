<?php namespace App\Http\Requests\Country;

use App\Http\Requests\AbstractFormRequest;

/**
 * Class UpdateCountryRequest
 *
 * @package App\Http\Requests\Country
 * @author  Nick Menke <nick@nlmenke.net>
 */
class UpdateCountryRequest extends AbstractFormRequest
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
            'iso_alpha_2' => 'required|string|size:2|unique:countries,iso_alpha_2,' . $this->route('country') . ',id,deleted_at,null',
            'iso_alpha_3' => 'required|string|size:3|unique:countries,iso_alpha_3,' . $this->route('country') . ',id,deleted_at,null',
            'iso_numeric' => 'required|string|size:3|unique:countries,iso_numeric,' . $this->route('country') . ',id,deleted_at,null',
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
