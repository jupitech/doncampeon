<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GameNivelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_nivel', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nivel_nombre');
            $table->integer('nivel_puntos');
             $table->integer('nivel_minimo');
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
         Schema::drop('game_nivel');
    }
}
