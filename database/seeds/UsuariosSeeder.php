<?php

use Illuminate\Database\Seeder;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estado')->insert([
            ['nombre' => 'Pendiente'],
            ['nombre' => 'Aceptado'],
            ['nombre' => 'Rechazado'],
            ['nombre' => 'Solicitud de cancelación'],
            ['nombre' => 'Cancelado'],
        ]);

        DB::table('rol')->insert([
            ['nombre' => 'Administrador'],
            ['nombre' => 'Profesor']
        ]);

        DB::table('usuario')->insert([
            [
                'nombre' => 'Alberto',
                'apellidoP' => 'Valdes',
                'apellidoM' => 'Valtierra',
                'correo' => 'alberto@gmail.com',
                'telefono' => '7224567841',
                'usuario' => 'betoval',
                'password' => bcrypt('123456'),
                'fk_id_rol' => 1
            ],
            [
                'nombre' => 'Julieta',
                'apellidoP' => 'Ruiz',
                'apellidoM' => 'Jimenez',
                'correo' => 'julieta@gmail.com',
                'telefono' => '7224567841',
                'usuario' => 'julieta',
                'password' => bcrypt('123456'),
                'fk_id_rol' => 2
            ],
            [
                'nombre' => 'Banny Sabel',
                'apellidoP' => 'Hernandez',
                'apellidoM' => 'Cardona',
                'correo' => 'banny@gmail.com',
                'telefono' => '7224567841',
                'usuario' => 'banny',
                'password' => bcrypt('123456'),
                'fk_id_rol' => 2
            ],
        ]);
    }
}