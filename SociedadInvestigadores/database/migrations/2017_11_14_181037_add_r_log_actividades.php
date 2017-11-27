<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRLogActividades extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('r_log_actividades', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('fecha');
            $table->longText('accion');
            $table->integer('id_cuenta')->unsigned();

            $table->foreign('id_cuenta')->references('id')->on('r_cuenta');
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
        Schema::dropIfExists('r_log_actividades');
    }
}
