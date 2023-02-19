<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBasicExtendedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('basic_extendeds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('language_id')->nullable();
            $table->string('pricing_subtitle')->nullable();
            $table->string('pricing_title')->nullable();
            $table->tinyInteger('pricing_section')->default(1);
            $table->tinyInteger('cookie_alert_status')->default(1);
            $table->tinyInteger('is_facebook_pexel')->default(0);
            $table->text('cookie_alert_text')->nullable();
            $table->text('facebook_pexel_script')->nullable();
            $table->string('cookie_alert_button_text')->nullable();
            $table->string('to_mail')->nullable();
            $table->string('default_language_direction')->nullable();
            $table->string('hero_overlay_color')->nullable();
            $table->text('blogs_meta_keywords')->nullable();
            $table->text('blogs_meta_description')->nullable();
            $table->string('from_mail')->nullable();
            $table->string('from_name')->nullable();
            $table->tinyInteger('is_smtp')->default(0);
            $table->string('smtp_host')->nullable();
            $table->string('smtp_port')->nullable();
            $table->string('encryption')->nullable();
            $table->string('smtp_username')->nullable();
            $table->string('smtp_password')->nullable();
            $table->text('popular_tags')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('basic_extendeds');
    }
}
