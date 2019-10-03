<?php declare(strict_types=1);

namespace App\Exceptions\Localization;

use Exception;

/**
 * Class ActiveLocalesNotDefinedException
 *
 * @package App\Exceptions\Localization
 * @author  Nick Menke <nick@nlmenke.net>
 */
class ActiveLocalesNotDefinedException extends Exception
{
    /**
     * Create a new exception instance.
     *
     * @param string $message
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
