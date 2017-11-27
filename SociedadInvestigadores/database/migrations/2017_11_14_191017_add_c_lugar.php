<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCLugar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_lugar', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 100);
            $table->enum('tipo', ['País', 'Estado', 'Municipio/Delegación']);
            $table->integer('id_parent');
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
        Schema::dropIfExists('c_lugar');
    }
}
