<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BasicSetting extends Model
{
    public $timestamps = false;

    protected $fillable = [
        "language_id", 
        'intro_section_title',
        'intro_title',
        'intro_text',
        'intro_contact_text',
        'intro_contact_number',
        'intro_video_image',
        'intro_signature',
        'intro_video_link',
        'intro_main_image',
        'team_section_title',
        'team_section_subtitle',
        'feature_section',
        'intro_section',
        'menu_section',
        'team_section',
        'testimonial_section',
        'news_section',
        'special_section',
        'instagram_section',
        'table_section',
        'top_footer_section',
        'copyright_section',
        'footer_text',
        'copyright_text',
        'footer_logo',
        'reservation_title',
        'menu_page1',
        
       ];

    public function language() {
        return $this->belongsTo('App\Models\Language');
    }


}
