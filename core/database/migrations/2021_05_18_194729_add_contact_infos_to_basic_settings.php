<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddContactInfosToBasicSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('basic_settings', function (Blueprint $table) {
            $table->text('contact_address')->nullable()->change();
            $table->text('contact_number')->nullable()->change();
            $table->text('contact_mails')->nullable()->after('contact_number');
            $table->integer('map_zoom')->default(10)->after('longitude');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('basic_settings', function (Blueprint $table) {
            $table->dropColumn(['contact_address','contact_number','contact_mails','map_zoom']);
        });
    }
}
