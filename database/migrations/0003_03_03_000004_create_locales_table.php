<?php
/**
 * Create Locales Table migration.
 *
 * @author Nick Menke <git@nlmenke.net>
 */

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Creates the database table required for Locale models.
 *
 * @since 0.0.0-vertebrae introduced
 */
final class CreateLocalesTable extends Migration
{
    /**
     * The main table used by the migration.
     */
    public const string TABLE = 'locales';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(self::TABLE, function (Blueprint $table): void {
            $table->id();
            $table->foreignId('language_id')->constrained(CreateLanguagesTable::TABLE)->cascadeOnDelete();
            $table->foreignId('country_id')->nullable()->constrained(CreateCountriesTable::TABLE)->cascadeOnDelete();
            $table->foreignId('script_id')->constrained(CreateScriptsTable::TABLE)->cascadeOnDelete();
            $table->string('code', 35)->unique()->index(); // IETF BCP 47; 35-char; @see https://www.rfc-editor.org/rfc/rfc5646#section-4.4.1
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
     */
    public function down(): void
    {
        Schema::dropIfExists(self::TABLE);
    }
}
