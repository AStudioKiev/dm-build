<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Type extends Model
{
    protected $fillable = [
        'name', 'country', 'image', 'label', 'price_list',
        'short_description', 'description', 'long_description', 'parent_id'
    ];
}
