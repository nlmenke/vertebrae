<?php
/**
 * Create Scripts Table migration.
 *
 * @author Nick Menke <git@nlmenke.net>
 */

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Creates the database table required for Script models.
 *
 * @since 0.0.0-vertebrae introduced
 */
final class CreateScriptsTable extends Migration
{
    /**
     * The main table used by the migration.
     */
    public const string TABLE = 'scripts';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(self::TABLE, function (Blueprint $table): void {
            $table->id();
            $table->string('iso_alpha', 4)->unique()->index(); // ISO 15924 alpha; 4-char
            $table->string('iso_numeric', 3)->unique()->index(); // ISO 15924 numeric; 3-number
            $table->string('name')->unique()->index();
            $table->string('direction')->default('ltr');
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
