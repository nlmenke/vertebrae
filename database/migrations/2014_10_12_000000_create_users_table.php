<?php declare(strict_types=1);
/**
 * Create Users Table.
 *
 * @package   Database Migrations
 * @author    Taylor Otwell <taylor@laravel.com>
 * @author    Nick Menke <nick@nlmenke.net>
 * @copyright 2018-2019 Nick Menke
 * @link      https://github.com/nlmenke/vertebrae
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * The Create Users migration.
 *
 * This migration creates the `users` table used to hold registered users of
 * the application.
 *
 * @since 0.0.0-framework introduced
 * @since x.x.x           set table to a constant
 */
class CreateUsersTable extends Migration
{
    /**
     * Set the table used by the migration.
     *
     * @since x.x.x introduced
     * @var string
     */
    const TABLE = 'users';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create(self::TABLE, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists(self::TABLE);
    }
}
