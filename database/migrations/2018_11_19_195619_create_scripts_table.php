<?php declare(strict_types=1);
/**
 * Create Scripts Table.
 *
 * @package   Database Migrations
 * @author    Nick Menke <nick@nlmenke.net>
 * @copyright 2018-2019 Nick Menke
 * @link      https://github.com/nlmenke/vertebrae
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * The Create Scripts migration.
 *
 * This migration creates the `scripts` table used to hold currency scripts
 * used by the application.
 *
 * @since x.x.x introduced
 */
class CreateScriptsTable extends Migration
{
    const TABLE = 'scripts';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create(self::TABLE, function (Blueprint $table) {
            $table->increments('id');
            $table->string('iso_alpha', 4); // ISO 15924 alpha; 4-char
            $table->string('iso_numeric', 3); // ISO 15924 numeric; 3-number
            $table->string('name');
            $table->string('direction')->default('l-r');
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
