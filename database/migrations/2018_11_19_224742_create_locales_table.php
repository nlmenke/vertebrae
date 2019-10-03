<?php declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * Class CreateLocalesTable
 *
 * @author Nick Menke <nick@nlmenke.net>
 */
class CreateLocalesTable extends Migration
{
    const TABLE = 'locales';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create(self::TABLE, function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('country_id')->nullable();
            $table->foreign('country_id')->references('id')->on(CreateCountriesTable::TABLE);
            $table->unsignedInteger('language_id');
            $table->foreign('language_id')->references('id')->on(CreateLanguagesTable::TABLE);
            $table->unsignedInteger('script_id');
            $table->foreign('script_id')->references('id')->on(CreateScriptsTable::TABLE);
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
    public function down(): void
    {
        Schema::dropIfExists(self::TABLE);
    }
}
