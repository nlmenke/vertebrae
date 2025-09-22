<?php

/**
 * Create Countries Table.
 *
 * @package Database Migrations
 *
 * @author    Nick Menke <nick@nlmenke.net>
 * @copyright 2018-2020 Nick Menke
 *
 * @link https://github.com/nlmenke/vertebrae
 */

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * The Create Countries migration.
 *
 * This migration creates the `countries` table used to hold countries used by
 * the application.
 *
 * @since x.x.x introduced
 */
class CreateCountriesTable extends Migration
{
    public const TABLE = 'countries';

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
            $table->unsignedBigInteger('currency_id')->nullable();
            $table->foreign('currency_id')->references('id')->on(CreateCurrenciesTable::TABLE);
            $table->string('iso_alpha_2', 2)->index(); // ISO 3166-1 alpha-2; 2-char
            $table->string('iso_alpha_3', 3)->index(); // ISO 3166-1 alpha-3; 3-char
            $table->string('iso_numeric', 3)->index(); // ISO 3166-1 numeric; 3-number
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
