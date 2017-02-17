<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PaqueteTukisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('paquete_tukis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_paquete');
            $table->integer('tukis_paquete');
            $table->integer('cantidad_max');
            $table->float('monto_dolar');
            $table->float('monto_quetzal');
            $table->float('fee_paquete');
            $table->float('neto_dolar');
            $table->float('neto_quetzal');
            $table->integer('paquete_activado');
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
        Schema::drop('paquete_tukis');
    }
}
