<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTukiscompradosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tukis_comprados', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo');
            $table->string('transaccion');
            $table->string('respuesta');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('id_paquete')->unsigned()->index();
            $table->foreign('id_paquete')->references('id')->on('paquete_tukis');
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
        Schema::drop('tukis_comprados');
    }
}
