<?php

use Illuminate\Database\Seeder;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('notifications')->insert([
            'id'                => '1',
            'title'             => 'Welcome  To Application',
            'message'           => 'Enjoy Your Tournament',
            'picture'           => '',
            'url'               => '',
        ]);
    }
}
