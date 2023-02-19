<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBasicSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('basic_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('language_id')->nullable();
            $table->string('favicon')->nullable();
            $table->string('logo')->nullable();
            $table->string('website_title')->nullable();
            $table->string('base_color')->nullable();
            $table->string('support_email')->nullable();
            $table->string('support_phone')->nullable();
            $table->string('breadcrumb')->nullable();
            $table->string('footer_logo')->nullable();
            $table->string('footer_text')->nullable();
            $table->string('newsletter_text')->nullable();
            $table->text('copyright_text')->nullable();
            $table->string('hero_bg')->nullable();
            $table->string('hero_section_title')->nullable();
            $table->string('hero_section_text')->nullable();
            $table->string('hero_section_button_text')->nullable();
            $table->string('hero_section_button_url')->nullable();
            $table->string('hero_section_video_link')->nullable();
            $table->string('intro_section_title')->nullable();
            $table->string('intro_title')->nullable();
            $table->text('intro_text')->nullable();
            $table->string('intro_contact_text')->nullable();
            $table->string('intro_contact_number')->nullable();
            $table->string('intro_video_image')->nullable();
            $table->string('intro_signature')->nullable();
            $table->string('intro_video_link')->nullable();
            $table->string('intro_main_image')->nullable();
            $table->string('team_section_title')->nullable();
            $table->string('team_section_subtitle')->nullable();
            $table->string('contact_form_title')->nullable();
            $table->string('contact_address')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('contact_text')->nullable();
            $table->string('latitude')->nullable();
            $table->string('contact_info_title')->nullable();
            $table->string('longitude')->nullable();
            $table->text('tawk_to_script')->nullable();
            $table->text('google_analytics_script')->nullable();
            $table->tinyInteger('is_recaptcha')->default();
            $table->string('google_recaptcha_site_key')->nullable();
            $table->string('google_recaptcha_secret_key')->nullable();
            $table->tinyInteger('is_tawkto')->default(1);
            $table->tinyInteger('is_disqus')->default(1);
            $table->text('disqus_script')->nullable();
            $table->text('maintainance_text')->nullable();
            $table->tinyInteger('is_analytics')->default(1);
            $table->tinyInteger('maintainance_mode')->default(0);
            $table->tinyInteger('is_announcement')->default(1);
            $table->string('announcement')->nullable();
            $table->decimal('announcement_delay',11,2)->default(0.00);
            $table->string('testimonial_title')->nullable();
            $table->string('blog_section_title')->nullable();
            $table->string('blog_section_subtitle')->nullable();
            $table->string('blog_title')->nullable();
            $table->string('blog_details_title')->nullable();
            $table->string('gallery_title')->nullable();
            $table->string('team_title')->nullable();
            $table->string('contact_title')->nullable();
            $table->string('menu_title')->nullable();
            $table->string('reservation_title')->nullable();
            $table->string('items_title')->nullable();
            $table->string('menu_details_title')->nullable();
            $table->string('cart_title')->nullable();
            $table->string('checkout_title')->nullable();
            $table->string('error_title')->nullable();
            $table->string('checkout_title')->nullable();
            $table->string('home_version')->nullable();
            $table->tinyInteger('feature_section')->default(1);
            $table->tinyInteger('intro_section')->default(1);
            $table->tinyInteger('testimonial_section')->default(1);
            $table->tinyInteger('team_section')->default(1);
            $table->tinyInteger('news_section')->default(1);
            $table->tinyInteger('menu_section')->default(1);
            $table->tinyInteger('special_section')->default(1);
            $table->tinyInteger('instagram_section')->default(1);
            $table->tinyInteger('table_section')->default(1);
            $table->tinyInteger('top_footer_section')->default(1);
            $table->tinyInteger('copyright_section')->default(1);
            $table->tinyInteger('is_quote')->default(1);
            $table->tinyInteger('item_page')->default(1);
            $table->tinyInteger('menu_page')->default(1);
            $table->tinyInteger('blog_page')->default(1);
            $table->tinyInteger('cart_page')->default(1);
            $table->tinyInteger('checkout_page')->default(1);
            $table->tinyInteger('contact_page')->default(1);
            $table->tinyInteger('gallery_page')->default(1);
            $table->tinyInteger('team_page')->default(1);
            $table->string('pages_p_link')->nullable();
            $table->string('office_time')->nullable();


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
        Schema::dropIfExists('basic_settings');
    }
}
