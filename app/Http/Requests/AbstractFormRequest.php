<?php
/**
 * Abstract form request.
 *
 * @author Nick Menke <git@nlmenke.net>
 */

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Base form request that all other form requests extend.
 *
 * @since 0.0.0-vertebrae introduced
 */
abstract class AbstractFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    abstract public function authorize(): bool;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|list<ValidationRule|string>|string>
     */
    abstract public function rules(): array;
}
