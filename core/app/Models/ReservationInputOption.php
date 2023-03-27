<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReservationInputOption extends Model
{
    protected $fillable = ['type', 'label', 'name', 'placeholder', 'required'];

    public function reservation_input() {
        return $this->belongsTo('App\Models\ReservationInput');
    }
}
