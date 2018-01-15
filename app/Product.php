<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'image', 'description', 'short_description', 'colors',
        'type', 'subtype', 'code', 'price'
    ];

    protected $dates = ['deleted_at'];
}
