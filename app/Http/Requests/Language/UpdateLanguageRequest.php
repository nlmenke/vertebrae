<?php declare(strict_types=1);

namespace App\Http\Requests\Language;

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
            'iso_alpha_2' => 'required|string|size:2|unique:languages,iso_alpha_2,' . $this->route('language') . ',id,deleted_at,NULL',
            'iso_alpha_3' => 'required|string|size:3|unique:languages,iso_alpha_3,' . $this->route('language') . ',id,deleted_at,NULL',
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
