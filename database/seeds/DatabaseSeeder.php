<?php declare(strict_types=1);
/**
 * Database Seeder.
 *
 * @package   Database Seeders
 * @author    Taylor Otwell <taylor@laravel.com>
 * @author    Nick Menke <nick@nlmenke.net>
 * @copyright 2018-2019 Nick Menke
 * @link      https://github.com/nlmenke/vertebrae
 */

/**
 * The base database seeder class.
 *
 * This is the base seeder fired when no seeder class is passed to the artisan
 * migrate / seed console commands.
 *
 * @since 0.0.0-framework introduced
 * @since x.x.x           modified to extend AbstractSeeder
 */
class DatabaseSeeder extends AbstractSeeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $this->call(CurrenciesTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(LanguagesTableSeeder::class);
        $this->call(ScriptsTableSeeder::class);
        $this->call(LocalesTableSeeder::class); // must be after countries, languages, and scripts
    }
}
