<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jcategory extends Model
{
    public function jobs() {
        return $this->hasMany('App\Models\Job');
    }
}
