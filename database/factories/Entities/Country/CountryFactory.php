<?php
/**
 * Country Factory.
 *
 * This file provides a convenient way to generate new model instances for
 * testing / seeding countries to the application's database.
 *
 * @package Database Factories
 *
 * @author    Nick Menke <nick@nlmenke.net>
 * @copyright 2018-2020 Nick Menke
 *
 * @link  https://github.com/nlmenke/vertebrae
 * @since x.x.x introduced
 */

declare(strict_types=1);

namespace Database\Factories\Entities\Country;

use App\Entities\Country\Country;
use App\Entities\Currency\Currency;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * The Country factory class.
 *
 * This class gives the ability to create database entries in the countries
 * table. Factories should only be used in feature tests or any time you
 * require dummy data.
 *
 * @since 0.0.0-framework introduced
 */
class CountryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Country::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'currency_id' => Currency::factory()->create()->getId(),
            'iso_alpha_2' => $this->faker->unique()->countryCode,
            'iso_alpha_3' => $this->faker->unique()->countryISOAlpha3,
            'iso_numeric' => str_pad((string)$this->faker->unique()->randomNumber(2), 3, '0', STR_PAD_LEFT),
            'name' => $this->faker->country,
        ];
    }
}
