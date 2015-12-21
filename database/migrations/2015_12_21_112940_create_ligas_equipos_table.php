<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLigasEquiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('ligas_equipos', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('ligas_id')->unsigned()->index();
            $table->foreign('ligas_id')->references('id')->on('dc_ligas')->onDelete('cascade');
            $table->integer('equipos_id')->unsigned()->index();
            $table->foreign('equipos_id')->references('id')->on('dc_equipos')->onDelete('cascade');
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
        Schema::drop('ligas_equipos');
    }
}
