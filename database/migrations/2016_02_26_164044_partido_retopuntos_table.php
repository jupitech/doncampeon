<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PartidoRetopuntosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partido_retopuntos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('partido_id')->unsigned()->index();
            $table->foreign('partido_id')->references('id')->on('partido_calendario')->onDelete('cascade');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('marcador_casa');
            $table->integer('marcador_visita');
            $table->integer('cantidad_reto');
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
        Schema::drop('partido_retopuntos');
    }
}
