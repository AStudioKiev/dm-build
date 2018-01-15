<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Poster extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'image', 'isActive'
    ];

    protected $dates = ['deleted_at'];
}