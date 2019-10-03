<?php declare(strict_types=1);

use App\Entities\User\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

/** @var Factory $factory */
$factory->define(User::class, function (Faker $faker) {
    $name = $faker->unique()->name;

    return [
        'name' => $name,
        'email' => Str::snake($name, '.') . '@' . $faker->safeEmailDomain,
        'email_verified_at' => now(),
        'password' => bcrypt($name),
        'remember_token' => Str::random(10),
    ];
});
