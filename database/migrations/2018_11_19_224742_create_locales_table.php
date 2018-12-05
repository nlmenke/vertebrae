<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * Class CreateLocalesTable
 *
 * @author Nick Menke <nick@nlmenke.net>
 */
class CreateLocalesTable extends Migration
{
    const TABLENAME = 'locales';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Schema::create(self::TABLENAME, function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('country_id')->nullable();
            $table->foreign('country_id')->references('id')->on(CreateCountriesTable::TABLENAME);
            $table->unsignedInteger('language_id');
            $table->foreign('language_id')->references('id')->on(CreateLanguagesTable::TABLENAME);
            $table->unsignedInteger('script_id');
            $table->foreign('script_id')->references('id')->on(CreateScriptsTable::TABLENAME);
            $table->string('code', 11)->index(); // IETF language tag; see https://www.w3.org/International/articles/language-tags/#rfc
            $table->string('native'); // language name in the language and script
            $table->boolean('currency_symbol_first')->default(true);
            $table->string('decimal_mark')->default('.');
            $table->string('thousands_separator')->default(',');
            $table->boolean('active')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \Schema::dropIfExists(self::TABLENAME);
    }
}
