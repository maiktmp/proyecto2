<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrateProjectSchema extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rol', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
        });

        Schema::create('usuario', function (Blueprint $table) {
            $table->increments('id');
            $table->string('usuario');
            $table->string('password');
            $table->string('remember_token')->nullable();
            $table->string('nombre');
            $table->string('apellidoP');
            $table->string('apellidoM');
            $table->string('correo');
            $table->string('telefono', 30);
            $table->unsignedInteger('fk_id_rol');
            $table->timestamps();

            $table->foreign('fk_id_rol')
                ->references('id')
                ->on('rol');
        });

        Schema::create('estado', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
        });

        Schema::create('agenda', function (Blueprint $table) {
            $table->increments('id');
            $table->string('alumno');
            $table->string('no_control', 10);
            $table->string('proyecto');
            $table->dateTime('fecha');
            $table->unsignedInteger('fk_id_usuario');
            $table->unsignedInteger('fk_id_estado');
            $table->timestamps();

            $table->foreign('fk_id_usuario')
                ->references('id')
                ->on('usuario');

            $table->foreign('fk_id_estado')
                ->references('id')
                ->on('estado');
        });

        Schema::create('dia_inhabil', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dia_inhabil');
        Schema::dropIfExists('agenda');
        Schema::dropIfExists('estado');
        Schema::dropIfExists('usuario');
        Schema::dropIfExists('rol');
    }
}
