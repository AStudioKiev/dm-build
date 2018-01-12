<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Type
 *
 * @property int $id
 * @property string $name
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Type onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Type whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Type whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Type withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Type withoutTrashed()
 * @mixin \Eloquent
 * @property \Carbon\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Type whereDeletedAt($value)
 */
class Type extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'image', 'isActive'
    ];

    protected $dates = ['deleted_at'];
}
