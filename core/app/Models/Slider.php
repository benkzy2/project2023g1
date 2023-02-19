<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{

    protected $fillable = [
        'language_id',
        'text',
        'title',
        'button_text',
        'button_url',
        'button_text1',
        'button_url1',
        'image',
        'bg_image',
        'title_color',
        'text_color',
        'button_color',
        'serial_number',
        
    ];
        
    public function language() {
        return $this->belongsTo('App\Models\Language');
    }
}
