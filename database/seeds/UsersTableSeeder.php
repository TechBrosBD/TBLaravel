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
            'name' => "Admin",
            'email' => 'admin@techbros.com.bd',
            'password' => bcrypt('123456'),
            'phone' => '01612404200',
            'address' => 'Dhaka, Bangladesh',
            'nid' => '199801612404200',
            'role' => 'admin',
            'isActive' => '1',
        ]);
    }
}
