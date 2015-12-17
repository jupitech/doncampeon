<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('dc_equipos', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('nombre_equipo')->unique();
            $table->string('liga_equipo');
            $table->string('pais_equipo');
             $table->rememberToken();
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
        //
    }
}
