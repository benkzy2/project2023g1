<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'language_id',
        'stock',
        'category_id',
        'feature_image',
        'summary',
        'description',
        'current_price',
        'previous_price',
        'rating',
        'status',
        'is_feature',
    ];

    public function category() {
        return $this->hasOne('App\Models\Pcategory','id','category_id');
    }

    public function product_reviews() {
        return $this->hasMany('App\Models\ProductReview');
    }

    public function product_images() {
        return $this->hasMany('App\Models\ProductImage');
    }

    public function language() {
        return $this->belongsTo('App\Models\Language');
    }
}
