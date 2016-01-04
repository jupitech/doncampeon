<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GameParametrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_parametros', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('puntos_iniciales');
            $table->integer('puntos_recompensa');
            $table->integer('minimo_retos');
            $table->integer('recompensa_nojuegos');
            $table->integer('recompensa_pjuegos');
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
         Schema::drop('game_parametros');
    }
}
