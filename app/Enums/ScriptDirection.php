<?php
/**
 * Script Direction enum.
 *
 * @author Nick Menke <git@nlmenke.net>
 */

declare(strict_types=1);

namespace App\Enums;

/**
 * Contains a list of directions for language scripts.
 *
 * @since 0.0.0-vertebrae introduced
 */
enum ScriptDirection: string
{
    case LTR = 'ltr';
    case RTL = 'rtl';
    case TTB = 'ttb';
    case VARIES = 'varies';

    /**
     * Translates the current direction value.
     */
    public function trans(): string
    {
        return trans('scripts.directions.' . $this->value);
    }
}
