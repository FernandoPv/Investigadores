<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRInvestigador extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('r_investigador', function (Blueprint $table) {
            $table->increments('id');
            $table->string('direccion', 45);
            $table->string('codigo_postal', 45);
            $table->string('telefono', 25);
            $table->integer('extension');
            $table->integer('fax');
            $table->string('email', 45)->unique();
            $table->string('grado_academico', 45);
            $table->integer('id_lugar')->unsigned();
            $table->integer('id_programa_academico')->unsigned();
            $table->integer('id_cuenta')->unsigned();
            $table->integer('id_linea_investigacion')->unsigned();


            $table->foreign('id_lugar')->references('id')->on('c_lugar');
            $table->foreign('id_programa_academico')->references('id')->on('c_programa_academico');
            $table->foreign('id_cuenta')->references('id')->on('r_cuenta');
            $table->foreign('id_linea_investigacion')->references('id')->on('c_linea_investigacion');

            
            

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
        Schema::dropIfExists('r_investigador');
    }
}
