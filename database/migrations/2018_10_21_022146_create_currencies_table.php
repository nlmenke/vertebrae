<?php declare(strict_types=1);
/**
 * Create Currencies Table.
 *
 * @package   Database Migrations
 * @author    Nick Menke <nick@nlmenke.net>
 * @copyright 2018-2019 Nick Menke
 * @link      https://github.com/nlmenke/vertebrae
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * The Create Currencies migration.
 *
 * This migration creates the `currencies` table used to hold currencies used
 * by the application.
 *
 * @since x.x.x introduced
 */
class CreateCurrenciesTable extends Migration
{
    const TABLE = 'currencies';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create(self::TABLE, function (Blueprint $table) {
            $table->increments('id');
            $table->string('iso_alpha', 3)->index(); // ISO 4217 alpha; 3-char
            $table->string('iso_numeric', 3)->index(); // ISO 4217 numeric; 3-number
            $table->string('name');
            $table->string('symbol')->default('$');
            $table->unsignedInteger('decimal_precision')->default(2);
            $table->decimal('exchange_rate', 12, 6)->default(1);
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
