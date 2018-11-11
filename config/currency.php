<?php

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
    | OpenExchangeRates API Key
    |--------------------------------------------------------------------------
    |
    | This will allow you to update the currency exchange rates. You will
    | need to create an account at https://openexchangerates.org/ then
    | enter the App ID found in the confirmation email to your env.
    |
    */

    'api_key' => env('OPEN_EXCHANGE_RATES_APP_ID'),

];
