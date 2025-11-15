<?php
/**
 * Missing Or Invalid API Key Exception.
 *
 * @author Nick Menke <git@nlmenke.net>
 */

declare(strict_types=1);

namespace App\Exceptions\Api;

use App\Exceptions\AbstractException;
use Throwable;

/**
 * Notifies the user if there is no API key provided or that the API key
 * provided is invalid. If you're seeing this exception, you may need to check
 * your API key.
 *
 * @since 0.0.0-vertebrae introduced
 */
final class MissingOrInvalidApiKeyException extends AbstractException
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
            $message = trans('exceptions.api.missing_or_invalid_api_key');
        }

        parent::__construct($message, $code, $previous);
    }
}
