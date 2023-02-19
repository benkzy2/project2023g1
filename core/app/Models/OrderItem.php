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
        "category", 
        "image", 
        "summary", 
        "description", 
        "price", 
        "previous_price", 
  
       ];


}
