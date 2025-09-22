<?php

/**
 * Create Failed Jobs Table.
 *
 * @package Database Migrations
 *
 * @author    Taylor Otwell <taylor@laravel.com>
 * @author    Nick Menke <nick@nlmenke.net>
 * @copyright 2018-2020 Nick Menke
 *
 * @link https://github.com/nlmenke/vertebrae
 */

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * The Create Failed Jobs migration.
 *
 * This migration creates the `failed_jobs` table used to keep track of jobs
 * that failed to run at their scheduled times.
 *
 * @since 0.0.0-framework introduced
 * @since x.x.x           set table to a constant
 */
class CreateFailedJobsTable extends Migration
{
    /**
     * Set the table used by the migration.
     *
     * @since x.x.x introduced
     *
     * @var string
     */
    public const TABLE = 'failed_jobs';

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists(self::TABLE);
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create(self::TABLE, function (Blueprint $table): void {
            $table->id();
            $table->text('connection');
            $table->text('queue');
            $table->longText('payload');
            $table->longText('exception');
            $table->timestamp('failed_at')->useCurrent();
        });
    }
}
