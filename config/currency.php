<?php
/**
 * Currency configuration.
 *
 * @author Nick Menke <git@nlmenke.net>
 *
 * @since 0.0.0-vertebrae introduced
 */

declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | Application Currency Configuration
    |--------------------------------------------------------------------------
    |
    | The application currency determines the base currency used to calculate
    | pricing by the application. Set this value to any of the currencies
    | supported by the application. This should fit the locale setting.
    |
    */

    'default' => 'USD',

    /*
    |--------------------------------------------------------------------------
    | Exchange Rate API
    |--------------------------------------------------------------------------
    |
    | This will allow you to update the currency exchange rates. You will
    | need to create an account for your preferred exchange rate source
    | then add the provided API key for the service to your env file.
    |
    | Supported drivers: "currency_api", "exchangerate_api", "fixer",
    |                    "open_exchange_rates"
    |
    */

    'exchange_rates' => [
        'default_driver' => env('EXCHANGE_RATE_DRIVER', 'open_exchange_rates'),

        'drivers' => [

            'currency_api' => env('CURRENCYAPI_API_KEY'),
            'exchangerate_api' => env('EXCHANGERATEAPI_API_KEY'),
            'fixer' => env('FIXER_API_KEY'),
            'open_exchange_rates' => env('OPEN_EXCHANGE_RATES_APP_ID'),

        ],
    ],

];
