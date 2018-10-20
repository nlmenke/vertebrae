<?php

use App\Entities\User\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

/** @var Factory $factory */
$factory->define(User::class, function (Faker $faker) {
    $name = $faker->firstName . ' ' . $faker->lastName;

    return [
        'name' => $name,
        'email' => snake_case($name, '.') . '@' . $faker->safeEmailDomain,
        'email_verified_at' => now(),
        'password' => bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});
