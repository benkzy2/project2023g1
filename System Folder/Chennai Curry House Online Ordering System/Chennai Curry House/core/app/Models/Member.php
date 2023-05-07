<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    public $timestamps = false;

    protected $fillable = [
        "language_id", 
        'image',
        'name',
        'rank',
        'facebook',
        'twitter',
        'instagram',
        'linkedin',
        'feature',
       ];

    public function language() {
        return $this->belongsTo('App\Models\Language');
    }
}
