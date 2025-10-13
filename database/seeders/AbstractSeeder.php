<?php
/**
 * Abstract seeder.
 *
 * @author Nick Menke <git@nlmenke.net>
 */

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\AbstractModel;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Throwable;

/**
 * Base seeder that all other seeders extend.
 *
 * @since 0.0.0-vertebrae introduced
 */
abstract class AbstractSeeder extends Seeder
{
    /**
     * Items to be seeded.
     *
     * @var array<array<string, mixed>>
     */
    protected array $itemList = [];

    /**
     * The model used for importing.
     *
     * @var AbstractModel|EloquentBuilder<AbstractModel>
     */
    protected AbstractModel|EloquentBuilder $model;

    /**
     * Tables that should be truncated before running.
     *
     * @var list<string>
     */
    protected array $truncateTables = [];

    /**
     * Run the database seeds.
     *
     * @throws Throwable
     */
    final public function run(): void
    {
        $this->clearDatabase();

        DB::beginTransaction();

        foreach ($this->itemList as $item) {
            $this->model->create($item);
        }

        $this->complete();

        DB::commit();
    }

    /**
     * Clear existing data from tables in the truncateTables array.
     */
    protected function clearDatabase(): void
    {
        Schema::disableForeignKeyConstraints();

        foreach ($this->truncateTables as $table) {
            DB::table($table)->truncate();
        }

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Additional tasks to be completed after seeding.
     */
    protected function complete(): void {}
}
