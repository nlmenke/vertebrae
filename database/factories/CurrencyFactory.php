<?php
/**
 * Currency factory.
 *
 * @author Nick Menke <git@nlmenke.net>
 */

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Currency;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Generates test data for Currency models with default attributes and states.
 *
 * @extends Factory<Currency>
 *
 * @since 0.0.0-vertebrae introduced
 */
final class CurrencyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<model-property<Currency>, mixed>
     */
    public function definition(): array
    {
        return [
            'iso_alpha' => fake()->unique()->currencyCode(),
            'iso_numeric' => fake()->unique()->numerify(),
            'name' => fake()->unique()->country() . ' Dollar',
            'symbol' => fake()->randomAscii(),
            'decimal_precision' => fake()->randomNumber(1),
            'exchange_rate' => fake()->randomFloat(6, 0, 999999),
        ];
    }
}
