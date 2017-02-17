<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipofavoritoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipo_favorito', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->unsigned()->index();
            $table->foreign('id_user')->references('id')->on('users');
            $table->integer('id_equipo')->unsigned()->index();
            $table->foreign('id_equipo')->references('id')->on('dc_equipos');
            $table->integer('tipo_equipo');
            $table->integer('estado_equipo');
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
        Schema::drop('equipo_favorito');
    }
}
