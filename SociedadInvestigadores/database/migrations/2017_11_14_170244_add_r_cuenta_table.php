<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRCuentaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('r_cuenta', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 45);
            $table->string('contrasenia', 45);
            $table->enum('tipo', ['Administrador General','Administrador de Universidad','Investigador','Colaborador Alumno','Colaborador Externo']);
            $table->string('apellido_materno', 45);
            $table->string('apellido_paterno', 45);
            $table->enum('estatus', ['Activo','Inactivo']);
            $table->string('correo', 45)->unique();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('r_cuenta');
    }
}
