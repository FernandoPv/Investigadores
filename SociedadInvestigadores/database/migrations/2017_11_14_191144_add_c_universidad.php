<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCUniversidad extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_universidad', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 100);
            $table->string('acronimo', 45);
            $table->text('direccion');
            $table->string('codigo_postal', 6);
            $table->string('telefono', 25);
            $table->enum('tipo', ['Tecnológica', 'Politécnica']);
            $table->integer('id_lugar')->unsigned();


            $table->foreign('id_lugar')->references('id')->on('c_lugar');
            
            
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
        Schema::dropIfExists('c_universidad');
    }
}
