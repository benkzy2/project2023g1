<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sitemap extends Model
{
    protected $fillable = ['sitemap_url','filename','auto_update'];
    protected $table    = 'sitemaps';

    public $timestamps  = false;

}
