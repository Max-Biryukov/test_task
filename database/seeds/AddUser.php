<?php

use Illuminate\Database\Seeder;

class AddUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([
            'name' => str_random(10),
            'email' => 'test@mymail.com',
            'password' => bcrypt('test'),
        ]);
    }
}
