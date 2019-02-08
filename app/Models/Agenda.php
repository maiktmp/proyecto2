<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Agenda
 *
 * @property-read \App\Models\Estado $estado
 * @property-read \App\Models\Usuario $usuario
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Agenda newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Agenda newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Agenda query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $alumno
 * @property string $no_control
 * @property string $proyecto
 * @property string $fecha
 * @property int $fk_id_usuario
 * @property int $fk_id_estado
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Agenda whereAlumno($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Agenda whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Agenda whereFecha($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Agenda whereFkIdEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Agenda whereFkIdUsuario($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Agenda whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Agenda whereNoControl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Agenda whereProyecto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Agenda whereUpdatedAt($value)
 * @property string|null $alumno_email
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Agenda whereAlumnoEmail($value)
 */
class Agenda extends Model
{
    protected $table = 'agenda';
    protected $dates = ['fecha'];
    protected $fillable = [
        'alumno',
        'no_control',
        'proyecto',
        'fecha',
        'alumno_email'
    ];

    public function estado()
    {
        return $this->belongsTo(
            Estado::class,
            'fk_id_estado',
            'id'
        );
    }

    public function usuario()
    {
        return $this->belongsTo(
            Usuario::class,
            'fk_id_usuario',
            'id'
        );
    }
}