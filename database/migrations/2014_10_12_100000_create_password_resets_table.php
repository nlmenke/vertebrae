<?php
/**
 * Create Password Resets Table.
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
 * The Create Password Resets migration.
 *
 * This migration creates the `password_resets` table used to keep track of
 * tokens emailed to registered users who have forgotten their password to
 * allow them to reset it.
 *
 * @since 0.0.0-framework introduced
 * @since x.x.x           set table to a constant
 */
class CreatePasswordResetsTable extends Migration
{
    /**
     * Set the table used by the migration.
     *
     * @since x.x.x introduced
     *
     * @var string
     */
    public const TABLE = 'password_resets';

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
            $table->string('email')->index();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });
    }
}
