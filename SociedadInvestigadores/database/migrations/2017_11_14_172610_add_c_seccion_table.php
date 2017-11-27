<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCSeccionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_seccion', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 45);
            $table->string('url', 45);
            $table->integer('orden');
            $table->integer('parent_id');
            $table->enum('tipo', ['Seccion','Menu','Submenu','Opcion']);

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
        Schema::dropIfExists('c_seccion');
    }
}
