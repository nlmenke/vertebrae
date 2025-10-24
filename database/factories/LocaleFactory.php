<?php
/**
 * Locale factory.
 *
 * @author Nick Menke <git@nlmenke.net>
 */

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Country;
use App\Models\Language;
use App\Models\Locale;
use App\Models\Script;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Generates test data for Locale models with default attributes and states.
 *
 * @extends Factory<Locale>
 *
 * @since 0.0.0-vertebrae introduced
 */
final class LocaleFactory extends Factory
{
    /**
     * Indicate that the model should be active.
     */
    public function active(bool $active = true): self
    {
        return $this->state(fn (array $attributes): array => [
            'active' => $active,
        ]);
    }

    /**
     * Define the model's default state.
     *
     * @return array<model-property<Locale>, mixed>
     */
    public function definition(): array
    {
        return [
            'language_id' => Language::factory()->create()->id,
            'country_id' => fake()->boolean() ? Country::factory()->create()->id : null,
            'script_id' => Script::factory()->create()->id,
            'code' => fake()->unique()->locale(),
            'native' => fake()->unique()->word(),
            'currency_symbol_first' => fake()->boolean(),
            'decimal_mark' => fake()->randomAscii(),
            'thousands_separator' => fake()->randomAscii(),
            'active' => fake()->boolean(),
        ];
    }
}
