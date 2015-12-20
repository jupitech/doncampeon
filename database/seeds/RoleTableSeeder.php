<?php

use Illuminate\Database\Seeder;
use Bican\Roles\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::create([
		    'name' => 'Admin',
		    'slug' => 'admin',
		    'description' => 'Acceso completo a todo el sistema', // optional
		    'level' => 1, // optional, set to 1 by default
		]);

		$editorRole = Role::create([
		    'name' => 'Editor',
		    'slug' => 'editor',
		    'description' => 'Acceso a editar varias opciones en el sistema', // optional
		    'level' => 2, // optional, set to 1 by default
		]);

		$moderatorRole = Role::create([
		    'name' => 'Forum Moderator',
		    'slug' => 'forum.moderator',
		    'description' => 'Acceso para ver opciones en el sistema', // optional
		    'level' => 3, // optional, set to 1 by default
		]);

		$campeonRole = Role::create([
		    'name' => 'Campeon',
		    'slug' => 'campeon',
		    'description' => 'Usuario Don Campeon en el app', // optional
		    'level' => 4, // optional, set to 1 by default
		]);
    }
}
