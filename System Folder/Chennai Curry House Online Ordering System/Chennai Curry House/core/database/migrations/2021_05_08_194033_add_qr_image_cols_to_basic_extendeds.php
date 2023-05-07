<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddQrImageColsToBasicExtendeds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('basic_extendeds', function (Blueprint $table) {
            $table->string('qr_image', 100)->nullable();
            $table->string('qr_color', 50)->default(000000);
            $table->integer('qr_size')->default(250);
            $table->string('qr_style', 50)->default('square');
            $table->string('qr_eye_style', 50)->default('square');
            $table->integer('qr_margin')->default(0);
            $table->string('qr_text', 255)->nullable();
            $table->string('qr_text_color', 50)->default('000000');
            $table->integer('qr_text_size')->default(15);
            $table->integer('qr_text_x')->default(50);
            $table->integer('qr_text_y')->default(50);
            $table->string('qr_inserted_image', 50)->nullable();
            $table->integer('qr_inserted_image_size')->default(20);
            $table->integer('qr_inserted_image_x')->default(50);
            $table->integer('qr_inserted_image_y')->default(50);
            $table->string('qr_type', 50)->default('default')->comment('default, image, text');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('basic_extendeds', function (Blueprint $table) {
            $table->dropColumn(['qr_image', 'qr_color', 'qr_size', 'qr_style', 'qr_eye_style', 'qr_margin', 'qr_text', 'qr_text_color', 'qr_text_size', 'qr_text_x', 'qr_text_y', 'qr_inserted_image', 'qr_inserted_image_size', 'qr_inserted_image_x', 'qr_inserted_image_y', 'qr_type']);
        });
    }
}
