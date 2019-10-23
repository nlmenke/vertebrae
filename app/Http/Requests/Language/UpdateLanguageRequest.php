<?php
/**
 * Update Language Request.
 *
 * @package App\Http\Requests\Language
 *
 * @author    Nick Menke <nick@nlmenke.net>
 * @copyright 2018-2019 Nick Menke
 *
 * @link https://github.com/nlmenke/vertebrae
 */

declare(strict_types=1);

namespace App\Http\Requests\Language;

use App\Http\Requests\AbstractFormRequest;

/**
 * The Update Language form request class.
 *
 * This class handles form validation for modifying of a new language. It also
 * permits (or denies) a user access to modify a language.
 *
 * @since x.x.x introduced
 */
class UpdateLanguageRequest extends AbstractFormRequest
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
            'iso_alpha_2' => 'required|string|size:2|unique:languages,iso_alpha_2,' . $this->route('language') . ',id,deleted_at,NULL',
            'iso_alpha_3' => 'required|string|size:3|unique:languages,iso_alpha_3,' . $this->route('language') . ',id,deleted_at,NULL',
            'name' => 'required|string',
        ];
    }
}
