<?php
/**
 * Currency Factory.
 *
 * This file provides a convenient way to generate new model instances for
 * testing / seeding currencies to the application's database.
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

namespace Database\Factories;

use App\Entities\Currency\Currency;
use Illuminate\Database\Eloquent\Factory;

class CurrencyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Currency::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'iso_alpha' => $this->faker->unique()->currencyCode,
            'iso_numeric' => str_pad((string)$this->faker->unique()->randomNumber(2), 3, '0', STR_PAD_LEFT),
            'name' => $this->faker->country . ' Dollar',
            'symbol' => $this->faker->randomAscii,
            'decimal_precision' => $this->faker->randomNumber(1),
            'exchange_rate' => $this->faker->randomFloat(6, 0, 999999),
        ];
    }
}
