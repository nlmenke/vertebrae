<?php
/**
 * Abstract exception.
 *
 * @author Nick Menke <git@nlmenke.net>
 */

declare(strict_types=1);

namespace App\Exceptions;

use Exception;
use Throwable;

/**
 * Base exception that all other exceptions extend.
 *
 * @since 0.0.0-vertebrae introduced
 */
abstract class AbstractException extends Exception
{
    /**
     * Creates a new exception instance.
     */
    public function __construct(
        ?string $message = null,
        int $code = 0,
        ?Throwable $previous = null,
    ) {
        if ($message === null) {
            $message = 'Whoops, something went wrong.';
        }

        parent::__construct($message, $code, $previous);
    }
}
