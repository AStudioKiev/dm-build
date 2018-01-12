<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Banner
 *
 * @property int $id
 * @property string|null $name
 * @property string $image
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Banner whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Banner whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Banner whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Banner whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Banner whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Banner whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $isActive
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Banner onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Banner whereIsActive($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Banner withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Banner withoutTrashed()
 */
class Banner extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'image', 'isActive'
    ];

    protected $dates = ['deleted_at'];
}
