<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('language_id')->default(0);
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->integer('stock')->nullable();
            $table->integer('category_id')->nullable();
            $table->string('feature_image')->nullable();
            $table->text('summary')->nullable();
            $table->text('description')->nullable();
            $table->decimal('current_price',11,2)->default(0);
            $table->decimal('previous_price',11,2)->default(0);
            $table->decimal('rating',11,2)->default(0.00);
            $table->integer('status')->default(1);
            $table->integer('is_feature')->default(0);
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
        Schema::dropIfExists('products');
    }
}
