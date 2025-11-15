<?php
/**
 * Exception Language Lines - EN.
 *
 * @author Nick Menke <git@nlmenke.net>
 *
 * @since 0.0.0-vertebrae introduced
 */

declare(strict_types=1);

return [

    'api' => [
        'missing_api_key' => 'Missing :name API key.',
        'missing_or_invalid_api_key' => 'Missing or invalid API key.',
    ],

    'http' => [
        '401_title' => 'Unauthorized',
        '401_message' => 'Sorry, you are not authorized to view these records.',

        '403_title' => 'Forbidden',
        '403_message' => 'Sorry, you cannot access these records.',

        '404_title' => 'Not Found',
        '404_message' => 'No records were found.',

        '500_title' => 'Internal Server Error',
        '500_message' => 'Whoops, something went wrong.',

        '503_title' => 'Service Unavailable',
        '503_message' => 'Sorry, we are doing some maintenance. Please check back soon.',
    ],

];
