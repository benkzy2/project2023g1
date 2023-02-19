<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = [
        'language_id',
        'image',
        'serial_number',
    ];

    public function language() {
        return $this->belongsTo('App\Models\Language');
    }
}
