<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Estado
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Estado newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Estado newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Estado query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $nombre
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Estado whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Estado whereNombre($value)
 */
class Estado extends Model
{
    protected $table = 'estado';
}