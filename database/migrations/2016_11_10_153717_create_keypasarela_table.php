<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKeypasarelaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('key_pasarela', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('publickey');
            $table->string('secretkey');
            $table->integer('estado_key');
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
        Schema::drop('key_pasarela');
    }
}
