<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRMensaje extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('r_mensaje', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo', 45);
            $table->dateTime('fecha');
            $table->string('remitente', 45);
            $table->text('cuerpo');
            $table->timestamps();
        });

        Schema::create('r_mensaje_cuenta', function (Blueprint $table){

            $table->increments('id');
            $table->integer('id_cuenta')->unsigned();
            $table->integer('id_mensaje')->unsigned();



            $table->foreign('id_cuenta')->references('id')->on('r_cuenta');
            $table->foreign('id_mensaje')->references('id')->on('r_mensaje');
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
        Schema::dropIfExists('r_mensaje');
    }
}
