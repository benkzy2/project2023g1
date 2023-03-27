<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        "product_order_id",
        "product_id",
        "user_id",
        "title",
        "sku",
        "variations",
        "addons",
        "variations_price",
        "addons_price",
        "product_price",
        "total",
        "image",

       ];


}
