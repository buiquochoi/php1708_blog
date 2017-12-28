<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users=[
        	[
            'name' => 'admin',
            'email' => 'hoihobui1996@gmail.com',
            'role' => 10,
            'password' => Hash::make(123456)
            ],
            [
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'role' => 20,
            'password' => Hash::make(123456)
            ],
            [
            'name' => 'admin',
            'email' => 'admin1@gmail.com',
            'role' => 30,
            'password' => Hash::make(123456)
            ],
            [
            'name' => 'admin',
            'email' => 'admin2@gmail.com',
            'role' => 40,
            'password' => Hash::make(123456)
            ]

        ];
        DB::table('users')->insert($users);
    }
}
