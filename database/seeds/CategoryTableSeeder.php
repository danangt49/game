<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'id'               => '1',
            'category_name'    => 'GAME PC',
            'category_picture' => 'pc.png',
            'category_slug'    => '',
        ]);
        DB::table('categories')->insert([
            'id'               => '2',
            'category_name'    => 'GAME MOBILE',
            'category_picture' => 'pc.png',
            'category_slug'    => '',
        ]);
    }
}
