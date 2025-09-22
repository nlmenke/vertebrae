<?php

/**
 * Active Locales Not Defined Exception.
 *
 * @package App\Exceptions\Localization
 *
 * @author    Nick Menke <nick@nlmenke.net>
 * @copyright 2018-2020 Nick Menke
 *
 * @link https://github.com/nlmenke/vertebrae
 */

declare(strict_types=1);

namespace App\Exceptions\Localization;

use Exception;

/**
 * The Active Locales Not Defined exception class.
 *
 * This exception class notifies the user if the application does not have any
 * active locales. If you're getting this exception, you may need to seed your
 * database or make sure at least one (1) locale as active.
 *
 * @since x.x.x introduced
 */
class ActiveLocalesNotDefinedException extends Exception
{
    /**
     * Create a new exception instance.
     *
     * @param string $message
     *
     * @return void
     */
    public function __construct(string $message = null)
    {
        if ($message === null) {
            $message = trans('exceptions.active_locales_not_defined');
        }

        parent::__construct($message);
    }
}
