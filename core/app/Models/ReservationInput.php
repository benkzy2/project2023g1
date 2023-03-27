<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReservationInput extends Model
{
    protected $fillable = ['language_id', 'type', 'label', 'name', 'placeholder', 'required', 'active', 'order_number'];

    public function reservation_input_options()
    {
        return $this->hasMany('App\Models\ReservationInputOption');
    }

    public function language() {
      return $this->belongsTo('App\Models\Language');
    }
}
