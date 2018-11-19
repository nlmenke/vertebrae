<?php namespace App\Http\Requests\Language;

use App\Http\Requests\AbstractFormRequest;

/**
 * Class UpdateLanguageRequest
 *
 * @package App\Http\Requests\Language
 * @author  Nick Menke <nick@nlmenke.net>
 */
class UpdateLanguageRequest extends AbstractFormRequest
{
    /**
     * The authorization rules.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'iso_alpha_2' => 'required|size:2|unique:languages,iso_alpha_2,' . $this->route('language') . ',id,deleted_at,null',
            'iso_alpha_3' => 'required|size:3|unique:languages,iso_alpha_3,' . $this->route('language') . ',id,deleted_at,null',
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
