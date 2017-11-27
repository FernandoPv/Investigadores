<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCPermisoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_permiso', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_catalogo_privilegios');
            $table->integer('id_seccion')->unsigned();
            $table->integer('id_cuenta')->unsigned();


            $table->foreign('id_seccion')->references('id')->on('c_seccion')->onDelete('cascade');
            $table->foreign('id_cuenta')->references('id')->on('r_cuenta')->onDelete('cascade');
            $table->timestamps();

        });

        Schema::create('r_cuenta_permiso', function (Blueprint $table) {
            $table->increments('id');
          
            $table->integer('id_cuenta')->unsigned();
            $table->integer('id_permiso')->unsigned();


            $table->foreign('id_permiso')->references('id')->on('c_permiso')->onDelete('cascade');
            $table->foreign('id_cuenta')->references('id')->on('r_cuenta')->onDelete('cascade');
            $table->timestamps();
            
        });

        Schema::create('c_permiso_seccion', function (Blueprint $table) {
            $table->increments('id');
          
            $table->integer('id_permiso')->unsigned();
            $table->integer('id_seccion')->unsigned();


            $table->foreign('id_permiso')->references('id')->on('c_permiso')->onDelete('cascade');
            $table->foreign('id_seccion')->references('id')->on('c_seccion')->onDelete('cascade');
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
        Schema::dropIfExists('c_permiso');
    }
}
