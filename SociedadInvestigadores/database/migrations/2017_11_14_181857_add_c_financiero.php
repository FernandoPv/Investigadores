<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCFinanciero extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_financiero', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 45);
            $table->enum('tipo', ['Interno','Externo']);
            
            
            $table->timestamps();
        });

        DB::statement('ALTER TABLE `c_financiero` ADD `anio` YEAR NOT NULL');

       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('c_financiero');
    }
}
