<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductOrder extends Model
{
    protected $fillable = [
        "billing_country",
        "billing_fname",
        "billing_lname" ,
        "billing_address",
        "billing_city",
        "billing_email",
        "billing_number" ,
        "shpping_country",
        "shpping_fname",
        "shpping_lname",
        "shpping_address",
        "shpping_city",
        "shpping_email",
        "shpping_number" ,
        "shipping_charge",
        "total",
        "method",
        "currency_code",
        "currency_code_position",
        "currency_symbol",
        "currency_symbol_position",
        "order_number",
        "shipping_charge",
        "payment_status",
        "txnid",
        "charge_id",
        "order_status",
        'invoice_number'
       ];


    public function orderitems() {
        return $this->hasMany('App\Models\OrderItem');
    }

}
