<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMultiganadorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('multi_ganador', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_porganador')->unsigned()->index();
            $table->foreign('id_porganador')->references('id')->on('por_ganador');
            $table->integer('visita_equipo');
            $table->integer('resultado_casa');
            $table->integer('resultado_empate');
            $table->integer('resultado_visita');
            $table->float('probabilidad_casa');
            $table->float('probabilidad_empate');
            $table->float('probabilidad_visita');
            $table->float('multi_casa');
            $table->float('multi_empate');
            $table->float('multi_visita');
            $table->integer('estado_multi');
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
        Schema::drop('multi_ganador');
    }
}
