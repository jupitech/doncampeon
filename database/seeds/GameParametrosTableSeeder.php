<?php

use Illuminate\Database\Seeder;

class GameParametrosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('game_parametros')->insert([
            'puntos_iniciales' => '5000',
            'puntos_recompensa'  => '2000',
            'minimo_retos'   => '500',
            'recompensa_nojuegos'   => '5',
            'recompensa_pjuegos'   => '1000',
        ]);
    }
}
