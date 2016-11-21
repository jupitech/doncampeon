<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePorganadorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('por_ganador', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_liga')->unsigned()->index();
            $table->foreign('id_liga')->references('id')->on('dc_ligas');
            $table->integer('id_equipo');
            $table->integer('hasta_anio');
            $table->integer('estado_ganador');
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
        Schema::drop('por_ganador');
    }
}
