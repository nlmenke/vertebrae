<?php declare(strict_types=1);

/**
 * Class DatabaseSeeder
 *
 * @author Nick Menke <nick@nlmenke.net>
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
