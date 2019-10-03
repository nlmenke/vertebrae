<?php declare(strict_types=1);

namespace App\Http\Requests\Currency;

use App\Http\Requests\AbstractFormRequest;

/**
 * Class CreateCurrencyRequest
 *
 * @package App\Http\Requests\Currency
 * @author  Nick Menke <nick@nlmenke.net>
 */
class CreateCurrencyRequest extends AbstractFormRequest
{
    /**
     * The authorization rules.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'iso_alpha' => 'required|string|size:3|unique:currencies',
            'iso_numeric' => 'required|string|size:3|unique:currencies',
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
