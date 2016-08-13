<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('users')->insert([
            'first_name' => 'Admin',
            'last_name'  => 'DonC',
            'username'   => 'c1mp24n_min',
            'email'      => 'doncampeon.app@gmail.com',
            'facebook_id'      => '',
            'avatar'      => '',
            'api_token'      => '',
            'password'   =>  Hash::make('d4n_@2015')
        ]);
    }
}
