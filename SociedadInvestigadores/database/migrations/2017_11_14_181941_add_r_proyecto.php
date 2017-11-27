<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRProyecto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('r_proyecto', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo', 100);
            $table->enum('tipo', ['Investigacion Basica','Investigacion Aplicada','Desarrollo Tecnologico','Otro']);
            
            $table->text('objetivo');
            $table->enum('entregables', ['Tesis','Articulo Cientifico','Articulo de Divulgacion','Otro']);
            $table->double('importe_proyecto',15,8);
            $table->integer('id_financiero')->unsigned();


            $table->foreign('id_financiero')->references('id')->on('c_financiero');
            
            $table->timestamps();
        });

        DB::statement('ALTER TABLE `r_proyecto` ADD `fecha_inicio` YEAR NOT NULL');
        DB::statement('ALTER TABLE `r_proyecto` ADD `fecha_fin` YEAR NOT NULL');

        Schema::create('r_proyecto_cuenta', function (Blueprint $table){
            $table->increments('id');
            $table->integer('id_proyecto')->unsigned();
            $table->integer('id_cuenta')->unsigned();
            $table->enum('tipo', ['Responsable','Colaborador Alumno','Colaborador Externo']);

            $table->foreign('id_proyecto')->references('id')->on('r_proyecto')->onDelete('cascade');
            $table->foreign('id_cuenta')->references('id')->on('r_cuenta')->onDelete('cascade');

            $table->timestamps();
        


        });

        Schema::create('r_proyecto_financiero', function (Blueprint $table){
            
                        $table->increments('id');
                        $table->integer('id_proyecto')->unsigned();
                        $table->integer('id_financiero')->unsigned();
            
            
            
                        $table->foreign('id_proyecto')->references('id')->on('r_proyecto');
                        $table->foreign('id_financiero')->references('id')->on('c_financiero');
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
        Schema::dropIfExists('r_proyecto');
    }
}
