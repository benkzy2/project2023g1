<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddQrColsToTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tables', function (Blueprint $table) {
            $table->string('color', 50)->default('000000');
            $table->string('background_color', 50)->default('FFFFFF');
            $table->integer('size')->default(250);
            $table->string('style', 50)->default('square');
            $table->string('eye_style', 50)->default('square');
            $table->integer('margin')->default(0);
            $table->string('text', 255)->nullable();
            $table->string('text_color', 50)->nullable();
            $table->integer('text_size')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tables', function (Blueprint $table) {
            $table->dropColumn(['color', 'background_color', 'size','style', 'eye_style', 'margin', 'text', 'text_color', 'text_size']);
        });
    }
}
