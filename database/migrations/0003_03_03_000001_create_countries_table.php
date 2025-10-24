<?php
/**
 * Create Countries Table migration.
 *
 * @author Nick Menke <git@nlmenke.net>
 */

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Creates the database table required for Country models.
 *
 * @since 0.0.0-vertebrae introduced
 */
final class CreateCountriesTable extends Migration
{
    /**
     * The main table used by the migration.
     */
    public const string TABLE = 'countries';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(self::TABLE, function (Blueprint $table): void {
            $table->id();
            $table->foreignId('currency_id')->nullable()->constrained(CreateCurrenciesTable::TABLE)->nullOnDelete();
            $table->string('iso_alpha_2', 2)->unique()->index(); // ISO 3116-1 alpha-2; 2-char
            $table->string('iso_alpha_3', 3)->unique()->index(); // ISO 3116-1 alpha-3; 3-char
            $table->string('iso_numeric', 3)->unique()->index(); // ISO 3116-1 numeric; 3-number
            $table->string('name')->unique()->index();
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
