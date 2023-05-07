<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPosToServingMethods extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('serving_methods', function (Blueprint $table) {
            $table->tinyInteger('pos')->default(1)->comment('1 - active for POS, 0 - deactive for POS');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('serving_methods', function (Blueprint $table) {
            $table->dropColumn('pos');
        });
    }
}
