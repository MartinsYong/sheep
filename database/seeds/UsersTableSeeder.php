<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'id' => 1234567890,
            'name' => 'MT',
            'phone' => '00000000000',
            'password' => Hash::make('mysecrets'),
            'is_admin' => 1
        ]);
    }
}
