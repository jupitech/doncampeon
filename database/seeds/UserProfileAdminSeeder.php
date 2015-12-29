<?php

use Illuminate\Database\Seeder;

class UserProfileAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('user_profile')->insert([
            'first_name' => 'Admin',
            'last_name'  => 'DonC',
            'user_id'   => '1',
        ]);
    }
}
