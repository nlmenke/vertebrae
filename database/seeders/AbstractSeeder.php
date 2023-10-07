<?php
/**
 * Abstract Seeder.
 *
 * @package Database Seeders
 *
 * @author    Nick Menke <nick@nlmenke.net>
 * @copyright 2018-2020 Nick Menke
 *
 * @link https://github.com/nlmenke/vertebrae
 */

declare(strict_types=1);

namespace Database\Seeders;

use App\Entities\AbstractEntity;
use DB;
use Exception;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Seeder;
use Throwable;

/**
 * The base database seeder class.
 *
 * This class contains any functionality that would otherwise be duplicated in
 * other seeders. All other seeders should extend this class.
 *
 * @since x.x.x introduced
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
     * @var AbstractEntity|EloquentBuilder
     */
    protected $model;

    /**
     * Tables to be cleared before seeding.
     *
     * @var array
     */
    protected $truncateTables = [];

    /**
     * Run the seeder.
     *
     * @throws Exception
     * @throws Throwable
     *
     * @return void
     */
    public function run(): void
    {
        $this->cleanDatabase();

        DB::beginTransaction();

        foreach ($this->itemList as $item) {
            $this->model->create($item);
        }

        $this->complete();

        DB::commit();
    }

    /**
     * Clear existing data from tables in $truncateTables array.
     *
     * @return void
     */
    protected function cleanDatabase(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        foreach ($this->truncateTables as $table) {
            DB::table($table)->truncate();
        }

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }

    /**
     * Additional tasks to be completed after seeding has completed.
     *
     * @return void
     */
    protected function complete(): void
    {
    }
}
