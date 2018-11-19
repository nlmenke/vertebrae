<?php

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
    }
}
