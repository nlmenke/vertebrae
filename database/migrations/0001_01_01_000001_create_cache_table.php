<?php
/**
 * Create Cache Table migration.
 *
 * @author Taylor Otwell <taylor@laravel.com>
 * @author Nick Menke <git@nlmenke.net>
 */

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Creates the database tables required for caching.
 *
 * @since 0.0.0-framework introduced
 * @since 0.0.0-vertebrae add classname and table constants
 */
final class CreateCacheTable extends Migration
{
    /**
     * The main table used by the migration.
     */
    public const string TABLE = 'cache';

    /**
     * The cache locks table used by the migration.
     */
    public const string TABLE_LOCKS = 'cache_locks';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (config('cache.default') !== 'database') {
            return;
        }

        Schema::create(self::TABLE, function (Blueprint $table): void {
            $table->string('key')->primary();
            $table->mediumText('value');
            $table->integer('expiration');
        });

        Schema::create(self::TABLE_LOCKS, function (Blueprint $table): void {
            $table->string('key')->primary();
            $table->string('owner');
            $table->integer('expiration');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (config('cache.default') !== 'database') {
            return;
        }

        Schema::dropIfExists(self::TABLE);
        Schema::dropIfExists(self::TABLE_LOCKS);
    }
}
