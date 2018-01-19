<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'name_desc', 'image', 'long_description', 'description',
        'short_description', 'video_url', 'colors', 'type', 'subtype',
        'code', 'price'
    ];

    protected $dates = ['deleted_at'];
}
