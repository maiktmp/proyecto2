<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Rol
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Rol newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Rol newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Rol query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $nombre
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Rol whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Rol whereNombre($value)
 */
class Rol extends Model
{
    protected $table = 'rol';
}