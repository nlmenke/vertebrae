<?php
/**
 * Update Currency Request.
 *
 * @package App\Http\Requests\Currency
 *
 * @author    Nick Menke <nick@nlmenke.net>
 * @copyright 2018-2020 Nick Menke
 *
 * @link https://github.com/nlmenke/vertebrae
 */

declare(strict_types=1);

namespace App\Http\Requests\Currency;

use App\Http\Requests\AbstractFormRequest;

/**
 * The Update Currency form request class.
 *
 * This class handles form validation for modifying of a new currency. It also
 * permits (or denies) a user access to modify a currency.
 *
 * @since x.x.x introduced
 */
class UpdateCurrencyRequest extends AbstractFormRequest
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
            'iso_alpha' => 'required|string|size:3|unique:currencies,iso_alpha,' . $this->route('currency') . ',id,deleted_at,NULL',
            'iso_numeric' => 'required|string|size:3|unique:currencies,iso_numeric,' . $this->route('currency') . ',id,deleted_at,NULL',
            'name' => 'required|string',
        ];
    }
}
