<?php
/**
 * Locale Factory.
 *
 * This file provides a convenient way to generate new model instances for
 * testing / seeding locales to the application's database.
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

use App\Entities\Country\Country;
use App\Entities\Language\Language;
use App\Entities\Locale\Locale;
use App\Entities\Script\Script;
use Illuminate\Database\Eloquent\Factory;

class LocaleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Locale::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'country_id' => factory(Country::class)->create()->id,
            'language_id' => factory(Language::class)->create()->id,
            'script_id' => factory(Script::class)->create()->id,
            'code' => $this->faker->locale,
            'native' => $this->faker->word,
            'currency_symbol_first' => $this->faker->boolean,
            'decimal_mark' => $this->faker->randomAscii,
            'thousands_separator' => $this->faker->randomAscii,
            'active' => $this->faker->boolean,
        ];
    }
}
