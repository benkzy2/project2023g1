<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPostalCodeToProductOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_orders', function (Blueprint $table) {
            $table->text('postal_code')->after('shipping_charge')->nullable();
            $table->tinyInteger('postal_code_status')->after('postal_code')->default(0)->comment('1 - post code based delivery enabled, 0 - post code based delivery disabled');
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
            $table->dropColumn(['postal_code', 'postal_code_status']);
        });
    }
}
