<?php namespace App\Exceptions\Localization;

/**
 * Class ActiveLocalesNotDefinedException
 *
 * @package App\Exceptions\Localization
 * @author  Nick Menke <nick@nlmenke.net>
 */
class ActiveLocalesNotDefinedException extends \Exception
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
