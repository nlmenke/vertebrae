<?php

use App\Entities\AbstractEntity;
use Illuminate\Database\Seeder;

/**
 * Class AbstractSeeder
 *
 * @author Nick Menke <nick@nlmenke.net>
 */
abstract class AbstractSeeder extends Seeder
{
    /**
     * Items to be seeded.
     *
     * @var array
     */
    protected $itemList = [];

    /**
     * The entity used for importing.
     *
     * @var AbstractEntity
     */
    protected $model;

    /**
     * Tables to be cleared before seeing.
     *
     * @var array
     */
    protected $truncateTables = [];

    /**
     * Clear existing data in $truncateTables array.
     *
     * @return void
     */
    protected function cleanDatabase(): void
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        foreach ($this->truncateTables as $table) {
            \DB::table($table)->truncate();
        }

        \DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }

    /**
     * Run the seeder.
     *
     * @return void
     * @throws \Exception
     */
    public function run(): void
    {
        \DB::beginTransaction();

        $this->cleanDatabase();

        foreach ($this->itemList as $item) {
            $this->model->create($item);
        }

        $this->complete();

        \DB::commit();
    }

    /**
     * Additional tasks to be completed after seeding has completed.
     *
     * @return void
     */
    public function complete(): void
    {
        //
    }
}
