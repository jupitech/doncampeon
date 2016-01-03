<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserGameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_game', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('user_id')->unique()->unsigned()->index();
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                $table->integer('equipo_nacional');
                $table->integer('equipo_internacional');
                $table->integer('puntos_iniciales');
                $table->integer('puntos_acumulados');
                $table->integer('nivel_id');
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
