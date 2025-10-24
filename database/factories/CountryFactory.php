<?php
/**
 * Country factory.
 *
 * @author Nick Menke <git@nlmenke.net>
 */

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Country;
use App\Models\Currency;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Generates test data for Country models with default attributes and states.
 *
 * @extends Factory<Country>
 *
 * @since 0.0.0-vertebrae introduced
 */
final class CountryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<model-property<Country>, mixed>
     */
    public function definition(): array
    {
        return [
            'currency_id' => fake()->boolean(90) ? Currency::factory()->create()->id : null,
            'iso_alpha_2' => fake()->unique()->countryCode(),
            'iso_alpha_3' => fake()->unique()->countryISOAlpha3(),
            'iso_numeric' => fake()->unique()->numerify(),
            'name' => fake()->unique()->country(),
        ];
    }
}
