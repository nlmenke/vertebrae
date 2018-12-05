<?php

use App\Entities\Country\Country;
use App\Entities\Language\Language;
use App\Entities\Locale\Locale;
use App\Entities\Script\Script;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

/** @var Factory $factory */
$factory->define(Locale::class, function (Faker $faker) {
    return [
        'country_id' => factory(Country::class)->create()->id,
        'language_id' => factory(Language::class)->create()->id,
        'script_id' => factory(Script::class)->create()->id,
        'code' => $faker->locale,
        'native' => $faker->word,
        'currency_symbol_first' => $faker->boolean,
        'decimal_mark' => $faker->randomAscii,
        'thousands_separator' => $faker->randomAscii,
        'active' => $faker->boolean,
    ];
});
