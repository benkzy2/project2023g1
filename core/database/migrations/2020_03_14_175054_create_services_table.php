<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('language_id')->default(0);
            $table->integer('scategory_id')->nullable();
            $table->string('main_image', 255)->nullable();
            $table->string('title', 255)->nullable();
            $table->string('slug', 255)->nullable();
            $table->binary('content')->nullable();
            $table->text('summary')->nullable();
            $table->integer('serial_number')->default(0);
            $table->tinyInteger('feature')->default(0)->comment('0 - will not show in home, 1 - will show in home');
            $table->tinyInteger('details_page_status')->default(0)->comment('1 - enable, 0 - disable');
            $table->text('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
}
