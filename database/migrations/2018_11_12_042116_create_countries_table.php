<?php declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * Class CreateCountriesTable
 *
 * @author Nick Menke <nick@nlmenke.net>
 */
class CreateCountriesTable extends Migration
{
    const TABLE = 'countries';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create(self::TABLE, function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('currency_id')->nullable();
            $table->foreign('currency_id')->references('id')->on(CreateCurrenciesTable::TABLE);
            $table->string('iso_alpha_2', 2)->index(); // ISO 3166-1 alpha-2; 2-char
            $table->string('iso_alpha_3', 3)->index(); // ISO 3166-1 alpha-3; 3-char
            $table->string('iso_numeric', 3)->index(); // ISO 3166-1 numeric; 3-number
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
