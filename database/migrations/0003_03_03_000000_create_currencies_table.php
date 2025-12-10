<?php
/**
 * Create Currencies Table migration.
 *
 * @author Nick Menke <git@nlmenke.net>
 */

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Creates the database table required for Currency models.
 *
 * @since 0.0.0-vertebrae introduced
 */
final class CreateCurrenciesTable extends Migration
{
    /**
     * The main table used by the migration.
     */
    public const string TABLE = 'currencies';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(self::TABLE, function (Blueprint $table): void {
            $table->id();
            $table->string('iso_alpha', 3)->unique()->index(); // ISO 4217 alpha; 3-char
            $table->string('iso_numeric', 3)->unique()->index(); // ISO 4217 numeric; 3-number
            $table->string('name')->unique()->index();
            $table->string('symbol', 4)->default('$');
            $table->unsignedInteger('decimal_precision')->default(2);
            $table->decimal('exchange_rate', 12, 6)->default(1);
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
