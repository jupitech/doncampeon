<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProbabilidadLigasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('probabilidad_ligas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ligas_id')->unsigned()->index();
             $table->foreign('ligas_id')->references('id')->on('dc_ligas')->onDelete('cascade');
            $table->integer('marcador_casa');
            $table->integer('marcador_visita');
            $table->integer('no_partidos');
            $table->integer('probabilidad_por');
            $table->integer('duplicador');
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
          Schema::drop('user_game');
    }
}
