<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $fillable = ['id', 'name', 'is_default', 'code', 'rtl'];

    public function basic_setting() {
        return $this->hasOne('App\Models\BasicSetting');
    }

    public function basic_extended() {
        return $this->hasOne('App\Models\BasicExtended', 'language_id');
    }

    public function menus() {
        return $this->hasMany('App\Models\Menu');
    }

    public function sliders() {
        return $this->hasMany('App\Models\Slider');
    }

    public function features() {
        return $this->hasMany('App\Models\Feature');
    }

    public function testimonials() {
        return $this->hasMany('App\Models\Testimonial');
    }

    public function members() {
        return $this->hasMany('App\Models\Member');
    }


    public function ulinks() {
        return $this->hasMany('App\Models\Ulink');
    }

    public function pages() {
        return $this->hasMany('App\Models\Page');
    }

    public function galleries() {
        return $this->hasMany('App\Models\Gallery');
    }

    public function faqs() {
        return $this->hasMany('App\Models\Faq');
    }

    public function bcategories() {
        return $this->hasMany('App\Models\Bcategory');
    }

    public function blogs() {
        return $this->hasMany('App\Models\Blog');
    }

    public function jcategories() {
        return $this->hasMany('App\Models\Jcategory');
    }

    public function jobs() {
        return $this->hasMany('App\Models\Job');
    }

    public function reservation_inputs() {
        return $this->hasMany('App\Models\ReservationInput');
    }

    public function products(){
        return $this->hasMany('App\Models\Product');
    }
    public function shippings(){
        return $this->hasMany('App\Models\ShippingCharge');
    }
    public function pcategories(){
        return $this->hasMany('App\Models\Pcategory');
    }

    public function popups() {
        return $this->hasMany('App\Models\Popup');
    }
}
