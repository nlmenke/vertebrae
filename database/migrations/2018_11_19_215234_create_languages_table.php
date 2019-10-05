<?php declare(strict_types=1);
/**
 * Create Languages Table.
 *
 * @package   Database Migrations
 * @author    Nick Menke <nick@nlmenke.net>
 * @copyright 2018-2019 Nick Menke
 * @link      https://github.com/nlmenke/vertebrae
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * The Create Languages migration.
 *
 * This migration creates the `languages` table used to hold languages used by
 * the application.
 *
 * @since x.x.x introduced
 */
class CreateLanguagesTable extends Migration
{
    const TABLE = 'languages';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create(self::TABLE, function (Blueprint $table) {
            $table->increments('id');
            $table->string('iso_alpha_2', 2)->index(); // ISO 639-1 alpha-2; 2-char
            $table->string('iso_alpha_3', 3)->index(); // ISO 639-2 alpha-3; 3-char
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
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
