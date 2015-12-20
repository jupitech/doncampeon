<?php

use Illuminate\Database\Seeder;
use Bican\Roles\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $createUsersPermission = Permission::create([
    'name' => 'Create users',
    'slug' => 'create.users',
    'description' => '', // optional
    ]);

    $deleteUsersPermission = Permission::create([
        'name' => 'Delete users',
        'slug' => 'delete.users',
    ]);
    }
}
