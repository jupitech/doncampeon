<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovimientotransaccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimiento_transacciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('respuesta');
            $table->integer('user_id');
            $table->integer('id_paquete');
            $table->string('transaccion');
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
        Schema::drop('movimiento_transacciones');
    }
}
