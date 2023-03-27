<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = ['name', 'code', 'type', 'value', 'start_date', 'end_date', 'minimum_spend'];
}
