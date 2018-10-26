<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * Class CreateCurrenciesTable
 *
 * @author Nick Menke <nick@nlmenke.net>
 */
class CreateCurrenciesTable extends Migration
{
    const TABLENAME = 'currencies';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Schema::create(self::TABLENAME, function (Blueprint $table) {
            $table->increments('id');
            $table->string('iso_alpha', 3)->index(); // IS 4217; 3-char
            $table->string('iso_numeric', 3)->index(); // IS 4217; 3-number
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
    public function down()
    {
        \Schema::dropIfExists(self::TABLENAME);
    }
}
