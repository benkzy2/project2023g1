<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CurrencyInProductOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_orders', function (Blueprint $table) {
            $table->string('currency_code_position', '20')->nullable()->after('currency_code');
            $table->binary('currency_symbol')->nullable()->after('currency_code_position');
            $table->string('currency_symbol_position', '20')->nullable()->after('currency_symbol');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_orders', function (Blueprint $table) {
            $table->dropColumn(['currency_code', 'currency_code_position', 'currency_symbol', 'currency_symbol_position']);
        });
    }
}
