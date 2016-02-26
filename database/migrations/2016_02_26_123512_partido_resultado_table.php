<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PartidoResultadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partido_resultado', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('partido_id')->unique()->unsigned()->index();
            $table->foreign('partido_id')->references('id')->on('partido_calendario')->onDelete('cascade');
            $table->integer('marcador_casa');
             $table->integer('marcador_visita');
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
          Schema::drop('partido_resultado');
    }
}
