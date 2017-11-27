<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRAnuncioGeneral extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('r_anuncio_general', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo', 45);
            $table->dateTime('fecha_captura');
            $table->text('cuerpo');
            $table->enum('destino', ['Administradores', 'Investigadores', 'Público']);
            $table->enum('tipo', ['Anuncio','Noticia','Evento','Convocatoria']);
            $table->integer('id_investigador')->unsigned();
          


            $table->foreign('id_investigador')->references('id')->on('r_investigador');
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
        Schema::dropIfExists('r_anuncio_general');
    }
}
