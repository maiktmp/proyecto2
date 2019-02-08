<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * App\Models\Usuario
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Agenda[] $agendas
 * @property-read \App\Models\Rol $rol
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Usuario newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Usuario newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Usuario query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $usuario
 * @property string $password
 * @property string|null $remember_token
 * @property string $nombre
 * @property string $apellidoP
 * @property string $apellidoM
 * @property string $correo
 * @property string $telefono
 * @property int $fk_id_rol
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Usuario whereApellidoM($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Usuario whereApellidoP($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Usuario whereCorreo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Usuario whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Usuario whereFkIdRol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Usuario whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Usuario whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Usuario wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Usuario whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Usuario whereTelefono($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Usuario whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Usuario whereUsuario($value)
 * @property-read mixed $full_name
 */
class Usuario extends Authenticatable
{
    protected $table = 'usuario';
    protected $fillable = [
        'nombre',
        'apellidoP',
        'apellidoM',
        'correo',
        'telefono',
        'usuario',
        'password'
    ];

    public function rol()
    {
        return $this->belongsTo(
            Rol::class,
            'fk_id_rol',
            'id'
        );
    }

    public function agendas()
    {
        return $this->hasMany(
            Agenda::class,
            'fk_id_usuario',
            'id'
        );
    }

    public function esAdmin()
    {
        return $this->fk_id_rol == 1;
    }

    public function esProfesor()
    {
        return $this->fk_id_rol == 2;
    }

    public function getFullNameAttribute()
    {
        return $this->nombre . ' ' . $this->apellidoP . ' ' . $this->apellidoM;
    }
}