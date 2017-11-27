<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCProgramaAcademico extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_programa_academico', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 45);
            $table->integer('id_universidad')->unsigned();


            $table->foreign('id_universidad')->references('id')->on('c_universidad');
           
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
        Schema::dropIfExists('c_programa_academico');
    }
}
