<?php declare(strict_types=1);

use App\Entities\Language\Language;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

/** @var Factory $factory */
$factory->define(Language::class, function (Faker $faker) {
    return [
        'iso_alpha_2' => $faker->unique()->languageCode,
        'iso_alpha_3' => $faker->unique()->languageCode . $faker->randomLetter,
        'name' => $faker->firstName,
    ];
});
