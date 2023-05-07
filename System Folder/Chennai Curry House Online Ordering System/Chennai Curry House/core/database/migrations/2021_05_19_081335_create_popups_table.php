<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePopupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('popups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('language_id');
            $table->string('name', 255)->nullable();
            $table->string('image', 100)->nullable();
            $table->string('background_image', 100)->nullable();
            $table->string('background_color', 100)->nullable();
            $table->decimal('background_opacity', 8,2)->default(1.00);
            $table->string('title', 255)->nullable();
            $table->text('text')->nullable();
            $table->string('button_text', 255)->nullable();
            $table->text('button_url')->nullable();
            $table->string('button_color', 20)->nullable();
            $table->string('end_date', 255)->nullable();
            $table->string('end_time', 255)->nullable();
            $table->integer('delay')->default(1000)->comment('in milisconds');
            $table->integer('serial_number')->default(0);
            $table->tinyInteger('type')->default(1);
            $table->tinyInteger('status')->default(1)->comment('1 - active, 0 - deactive');
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('popups');
    }
}
