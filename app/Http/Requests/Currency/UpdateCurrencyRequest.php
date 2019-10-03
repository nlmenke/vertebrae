<?php declare(strict_types=1);

namespace App\Http\Requests\Currency;

use App\Http\Requests\AbstractFormRequest;

/**
 * Class UpdateCurrencyRequest
 *
 * @package App\Http\Requests\Currency
 * @author  Nick Menke <nick@nlmenke.net>
 */
class UpdateCurrencyRequest extends AbstractFormRequest
{
    /**
     * The authorization rules.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'iso_alpha' => 'required|string|size:3|unique:currencies,iso_alpha,' . $this->route('currency') . ',id,deleted_at,NULL',
            'iso_numeric' => 'required|string|size:3|unique:currencies,iso_numeric,' . $this->route('currency') . ',id,deleted_at,NULL',
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
