<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'             => 'ADMIN',
            'username'         => 'GAMEBOT',
            'email'            => 'admin@gmail.com',
            'password'         => bcrypt('123123123'),
            'phone'            => '',
            'gender'           => '',
            'is_admin'         => '1',
            'referal_code'     => '',
        ]);
    }
}
