<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PartidoCalendarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partido_calendario', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('equipo_casa');
            $table->integer('equipo_visita');
            $table->integer('liga');
            $table->integer('estadio');
            $table->string('descripcion');
            $table->timestamp('fecha_partido');
            $table->time('hora_partido');
            $table->integer('editor_id')->unsigned()->index();
            $table->foreign('editor_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::table('partido_calendario', function (Blueprint $table) {
            //
        });
    }
}
