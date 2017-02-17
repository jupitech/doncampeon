<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTukisganadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tukis_ganados', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo');
            $table->integer('id_partido')->unsigned()->index();
            $table->foreign('id_partido')->references('id')->on('partido_calendario');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('cantidad');
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
        Schema::drop('tukis_ganados');
    }
}
