<?php namespace App\Http\Requests\Language;

use App\Http\Requests\AbstractFormRequest;

/**
 * Class CreateLanguageRequest
 *
 * @package App\Http\Requests\Language
 * @author  Nick Menke <nick@nlmenke.net>
 */
class CreateLanguageRequest extends AbstractFormRequest
{
    /**
     * The authorization rules.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'iso_alpha_2' => 'required|string|size:2|unique:languages',
            'iso_alpha_3' => 'required|string|size:3|unique:languages',
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
