<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TableBook extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'date',
        'time',
        'person',
        'status',
    ];
}
