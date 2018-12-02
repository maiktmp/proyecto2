<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\DiaInhabil
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DiaInhabil newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DiaInhabil newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DiaInhabil query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $fecha
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DiaInhabil whereFecha($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DiaInhabil whereId($value)
 */
class DiaInhabil extends Model
{
    protected $table = 'dia_inhabil';
}